<x-admin-layout 
title="Categorias"
:breadcrumbs="[
    [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
    'href' => route('admin.categories.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
    ]">

    <x-wire-card>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <x-wire-input label="Nombre de la categoria" name="name" placeholder="Ingrese el nombre de la categoria" value="{{ old('name') }}"/>

            <x-wire-textarea label="Descripcion de la categoria" name="description" placeholder="Ingrese la descripcion de la categoria" value="{{ old('description') }}"/>
            
            <div class="flex justify-end">
            
            <x-wire-button black type="submit">
                Guardar
            </x-wire-button>
        </div>
        </form>
        
    </x-wire-card>
    
</x-admin-layout>