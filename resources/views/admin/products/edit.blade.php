<x-admin-layout 
title="Editar Producto"
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
        'name' => 'Editar',
    ]
    ]">

    @push('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
    
    <div class="mb-4">
    <form action="{{ route('admin.products.dropzone', $product) }}" class="dropzone" id="my-dropzone" method="POST">
        @csrf
    </form>
    </div>
    <x-wire-card>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre del producto" name="name" placeholder="Ingrese el nombre del producto" value="{{ old('name', $product->name) }}"/>

            <x-wire-textarea label="Descripcion del producto" name="description" placeholder="Ingrese la descripcion del producto">
                {{ old('description', $product->description) }}
            </x-wire-textarea>

            <x-wire-native-select label="Categoria" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </x-wire-native-select>

            <x-wire-input label="SKU" name="sku" placeholder="Ingrese el SKU" value="{{ old('sku', $product->sku) }}"/>

            <x-wire-input label="Codigo de barras" name="barcode" placeholder="Ingrese el codigo de barras" value="{{ old('barcode', $product->barcode) }}"/>

            <x-wire-input type="number" step="0.01" label="Precio" name="price" placeholder="Ingrese el precio" value="{{ old('price', $product->price) }}"/>
            
            <div class="flex justify-end">
            
            <x-wire-button black type="submit">
                Actualizar
            </x-wire-button>
        </div>
        </form>
        
    </x-wire-card>

    @push('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
    Dropzone.options.myDropzone = {

        addRemoveLinks: true,
        init: function(){
            let myDropzone = this;
            let images = @json($product->images);
            let storageUrl = "{{ Storage::url('') }}";

            images.forEach(function(image){
                let mockFile = { id: image.id, name: image.path.split('/').pop(), size: image.size };
                myDropzone.displayExistingFile(mockFile, storageUrl + image.path);
                myDropzone.emit('complete', mockFile);
                myDropzone.files.push(mockFile);
            });
            this.on('success', function(file, response){
                file.id = response.id;
            })
            this.on('removedfile', function(file){
                axios.delete(`/admin/images/${file.id}`)
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        }
    };
    </script>
    @endpush
    </x-admin-layout>
