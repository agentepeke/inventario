<div class="flex items-center space-x-2">
    <x-wire-button href="{{route('admin.categories.edit', $category)}}" light black>
        Editar
    </x-wire-button>
    <form action="{{route('admin.categories.destroy', $category)}}" method="post" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" light red>
            Eliminar
        </x-wire-button>
    </form>
</div>