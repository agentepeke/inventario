<x-admin-layout 
title="Almacén"
:breadcrumbs="[
    [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Almacenes',
    'href' => route('admin.warehouses.index'),
    ],
    [
        'name' => 'Editar',
    ]
    ]">

    <x-wire-card>
        <form action="{{ route('admin.warehouses.update', $warehouse) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <x-wire-input label="Nombre del almacén" name="name" placeholder="Ingrese el nombre del almacén" value="{{ old('name', $warehouse->name) }}"/>

            <x-wire-input label="Ubicación" name="location" placeholder="Ingrese la ubicación del almacén" value="{{ old('location', $warehouse->location) }}"/>
            
            <div class="flex justify-end space-x-2">
            
            <x-wire-button href="{{ route('admin.warehouses.index') }}" light black>
                Cancelar
            </x-wire-button>
            <x-wire-button black type="submit">
                Guardar
            </x-wire-button>
        </div>
        </form>
        
    </x-wire-card>
    
</x-admin-layout>
