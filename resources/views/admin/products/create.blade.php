<x-admin-layout 
title="Nuevo Producto"
:breadcrumbs="[
    [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
    'href' => route('admin.products.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
    ]">

    <x-wire-card>
        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-4">
            @csrf
            <x-wire-input label="Nombre del producto" name="name" placeholder="Ingrese el nombre del producto" value="{{ old('name') }}"/>

            <x-wire-textarea label="Descripcion del producto" name="description" placeholder="Ingrese la descripcion del producto" value="{{ old('description') }}"/>

            <x-wire-native-select label="Categoria" name="category_id" placeholder="Ingrese la categoria del producto" value="{{ old('category_id') }}">
                <option value="">Seleccione una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </x-wire-native-select>

            <x-wire-input label="SKU" name="sku" placeholder="Ingrese el SKU" value="{{ old('sku') }}"/>

            <x-wire-input label="Codigo de barras" name="barcode" placeholder="Ingrese el codigo de barras" value="{{ old('barcode') }}"/>

            <x-wire-input type="number" step="0.01" label="Precio" name="price" placeholder="Ingrese el precio" value="{{ old('price') }}"/>
            
            <div class="flex justify-end">
            
            <x-wire-button black type="submit">
                Guardar
            </x-wire-button>
        </div>
        </form>
        
    </x-wire-card>
    
</x-admin-layout>