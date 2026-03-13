<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('admin.warehouses.index');
    }

    public function create()
    {
        return view('admin.warehouses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'location' => 'nullable|string|min:3|max:255',
        ]);

        Warehouse::create($request->all());
        
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Almacén creado exitosamente',
            'text' => 'El almacén se ha creado correctamente',
        ]);

        return redirect()->route('admin.warehouses.index');
    }

    public function edit(Warehouse $warehouse)
    {
        return view('admin.warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'location' => 'nullable|string|min:3|max:255',
        ]);

        $warehouse->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Almacén actualizado exitosamente',
            'text' => 'El almacén se ha actualizado correctamente',
        ]);

        return redirect()->route('admin.warehouses.index');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Almacén eliminado exitosamente',
            'text' => 'El almacén se ha eliminado correctamente',
        ]);
        return redirect()->route('admin.warehouses.index');
    }
}
