<div class="flex items-center space-x-2">
    <x-wire-button href="{{route('admin.suppliers.edit', $supplier)}}" light black>
        Editar
    </x-wire-button>
    <form action="{{route('admin.suppliers.destroy', $supplier)}}" method="post" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" light red>
            Eliminar
        </x-wire-button>
    </form>
</div>
