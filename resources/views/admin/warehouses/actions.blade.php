<div class="flex items-center space-x-2">
    <x-wire-button href="{{route('admin.warehouses.edit', $warehouse)}}" light black>
        Editar
    </x-wire-button>
    <form action="{{route('admin.warehouses.destroy', $warehouse)}}" method="post" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" light red>
            Eliminar
        </x-wire-button>
    </form>
</div>
