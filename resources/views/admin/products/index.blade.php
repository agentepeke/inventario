<x-admin-layout 
title="Productos"
:breadcrumbs="[
    [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
    ],
    ['name' => 'Productos',
    ]
    ]">

    @push('css')
    <style>
        .image-product {
            width: 150px;
            height: 150px;
            object-fit: cover;
            object-position: center;
            border-radius: 5px;
        }
    </style>
    @endpush

    <x-slot name="action">
        <x-wire-button href="{{route('admin.products.create')}}" light black>
            Nueva producto
        </x-wire-button>
    </x-slot>
    @livewire('admin.datatables.product-table')

    @push('js')
        <script>
            forms = document.querySelectorAll('.delete-form')
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    
                    Swal.fire({
                        title: "¿Estas seguro de eliminar este producto?",
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