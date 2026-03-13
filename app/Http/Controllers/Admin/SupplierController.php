<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Identity;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin.suppliers.index');
    }

    public function create()
    {
        $identities = Identity::all();
        return view('admin.suppliers.create', compact('identities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'identity_id' => 'required|exists:identities,id',
            'document_number' => 'required|min:3|max:20|unique:suppliers',
            'name' => 'required|min:3|max:100',
            'address' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|email|max:100',
            'phone' => 'nullable|string|min:3|max:12',
        ]);

        $supplier = Supplier::create($request->all());
        
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Proveedor creado exitosamente',
            'text' => 'El proveedor se ha creado correctamente',
        ]);

        return redirect()->route('admin.suppliers.index');
    }

    public function edit(Supplier $supplier)
    {
        $identities = Identity::all();
        return view('admin.suppliers.edit', compact('supplier', 'identities'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'identity_id' => 'required|exists:identities,id',
            'document_number' => 'required|min:3|max:20|unique:suppliers,document_number,' . $supplier->id,
            'name' => 'required|min:3|max:100',
            'address' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|email|max:100',
            'phone' => 'nullable|string|min:3|max:12',
        ]);

        $supplier->update($request->all());

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Proveedor actualizado exitosamente',
            'text' => 'El proveedor se ha actualizado correctamente',
        ]);

        return redirect()->route('admin.suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Proveedor eliminado exitosamente',
            'text' => 'El proveedor se ha eliminado correctamente',
        ]);
        return redirect()->route('admin.suppliers.index');
    }
}
