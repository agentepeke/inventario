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
        'name' => 'Editar',
    ]
    ]">

    <x-wire-card>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre de la categoria" name="name" placeholder="Ingrese el nombre de la categoria" value="{{ old('name', $category->name) }}"/>

            <x-wire-textarea label="Descripcion de la categoria" name="description" placeholder="Ingrese la descripcion de la categoria">
                {{ old('description', $category->description) }}
            </x-wire-textarea>
            
            <div class="flex justify-end">
            
            <x-wire-button black type="submit">
                Actualizar
            </x-wire-button>
        </div>
        </form>
        
    </x-wire-card>
    </x-admin-layout>
