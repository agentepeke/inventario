<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:255',
            'barcode' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($data);
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Producto creado exitosamente',
            'text' => 'El producto se ha creado correctamente',
        ]);

        return redirect()->route('admin.products.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:255',
            'barcode' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product->update($data);
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Producto actualizado exitosamente',
            'text' => 'El producto se ha actualizado correctamente',
        ]);

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->inventories()->exists()){
            session()->flash('swal',[
                'icon' => 'error',
                'title' => 'No se puede eliminar el producto',
                'text' => 'El producto tiene inventarios',
            ]);
            return redirect()->route('admin.products.index');
        }

        if($product->purchasesOrders()->exists()||$product->quotes()->exists()){
            session()->flash('swal',[
                'icon' => 'error',
                'title' => 'No se puede eliminar el producto',
                'text' => 'El producto tiene compras o cotizaciones',
            ]);
            return redirect()->route('admin.products.index');
        }
        $product->delete();
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Producto eliminado exitosamente',
            'text' => 'El producto se ha eliminado correctamente',
        ]);

        return redirect()->route('admin.products.index');
    }

    public function dropzone(Request $request, Product $product)
    {
        $file = $request->file('file');
        $path = Storage::put('/images', $file);
        
        $product->images()->create([
            'path' => $path,
            'size' => $file->getSize(),
        ]);

        return response()->json([
            'success' => true,
            'id' => $product->images()->latest()->first()->id,
            'path' => $path,
        ]);
    }
}
