<x-admin-layout 
title="Almacenes"
:breadcrumbs="[
    [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
    ],
    ['name' => 'Almacenes',
    ]
    ]">

    <x-slot name="action">
        <x-wire-button href="{{route('admin.warehouses.create')}}" light black>
            Nuevo almacén
        </x-wire-button>
    </x-slot>
    @livewire('admin.datatables.warehouse-table')

    @push('js')
        <script>
            forms = document.querySelectorAll('.delete-form')
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    
                    Swal.fire({
                        title: "¿Estas seguro de eliminar este almacén?",
                        text: "No podras revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#000000",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, eliminar!",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-admin-layout>
