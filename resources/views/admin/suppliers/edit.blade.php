<x-admin-layout 
title="Proveedores"
:breadcrumbs="[
    [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Proveedores',
    'href' => route('admin.suppliers.index'),
    ],
    [
        'name' => 'Editar',
        'href' => route('admin.suppliers.edit', $supplier),
    ]
    ]">

    <x-wire-card>
        <form action="{{ route('admin.suppliers.update', $supplier) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <x-wire-native-select label="Tipo de documento" name="identity_id">
                    <option value="">Seleccione un tipo</option>
                    @foreach ($identities as $identity)
                        <option value="{{ $identity->id }}" @selected(old('identity_id', $supplier->identity_id) == $identity->id)>{{ $identity->name }}</option>
                    @endforeach
                </x-wire-native-select>

                <x-wire-input label="Numero de documento" name="document_number" placeholder="Ingrese el numero de documento" value="{{ old('document_number', $supplier->document_number) }}"/>
            </div>
            <x-wire-input label="Nombre del proveedor" name="name" placeholder="Ingrese el nombre del proveedor" value="{{ old('name', $supplier->name) }}"/>

            <div class="grid grid-cols-2 gap-4">
                <x-wire-input label="Direccion" name="address" placeholder="Ingrese la direccion" value="{{ old('address', $supplier->address) }}"/>

                <x-wire-input label="Email" name="email" placeholder="Ingrese el email" value="{{ old('email', $supplier->email) }}"/>
            </div>
            <x-wire-input label="Telefono" name="phone" placeholder="Ingrese el telefono" value="{{ old('phone', $supplier->phone) }}"/>
            
            <div class="flex justify-end space-x-2">
            <x-wire-button href="{{ route('admin.suppliers.index') }}" light black>
                Cancelar
            </x-wire-button>
            <x-wire-button black type="submit">
                Actualizar
            </x-wire-button>
        </div>
        </form>
        
    </x-wire-card>
    </x-admin-layout>
