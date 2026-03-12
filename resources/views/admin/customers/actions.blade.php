<div class="flex items-center space-x-2">
    <x-wire-button href="{{route('admin.customers.edit', $customer)}}" light black>
        Editar
    </x-wire-button>
    <form action="{{route('admin.customers.destroy', $customer)}}" method="post" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" light red>
            Eliminar
        </x-wire-button>
    </form>
</div>