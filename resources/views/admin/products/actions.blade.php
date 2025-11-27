<div class="flex items-center space-x-2">
    <x-wire-button href="{{route('admin.products.edit', $product)}}" light black>
        Editar
    </x-wire-button>
    <form action="{{route('admin.products.destroy', $product)}}" method="post" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" light red>
            Eliminar
        </x-wire-button>
    </form>
</div>