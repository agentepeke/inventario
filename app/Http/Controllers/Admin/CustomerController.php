<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Identity;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identities = Identity::all();
        return view('admin.customers.create', compact('identities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identity_id' => 'required|exists:identities,id',
            'document_number' => 'required|min:3|max:20|unique:customers',
            'name' => 'required|min:3|max:100',
            'address' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|email|max:100',
            'phone' => 'nullable|string|min:3|max:12',
        ]);

        $customer = Customer::create($request->all());
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Cliente creado exitosamente',
            'text' => 'El cliente se ha creado correctamente',
        ]);

        return redirect()->route('admin.customers.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $identities = Identity::all();
        return view('admin.customers.edit', compact('customer', 'identities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'identity_id' => 'required|exists:identities,id',
            'document_number' => 'required|min:3|max:20|unique:customers,document_number,' . $customer->id,
            'name' => 'required|min:3|max:100',
            'address' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|email|max:100',
            'phone' => 'nullable|string|min:3|max:12',
        ]);

        $customer->update($request->all());

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Cliente actualizado exitosamente',
            'text' => 'El cliente se ha actualizado correctamente',
        ]);

        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Cliente eliminado exitosamente',
            'text' => 'El cliente se ha eliminado correctamente',
        ]);
        return redirect()->route('admin.customers.index');
    }
}
