<x-admin-layout 
title="Categorias"
:breadcrumbs="[
    [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
    ],
    ['name' => 'Categorias',
    ]
    ]">

    <x-slot name="action">
        <x-wire-button href="{{route('admin.categories.create')}}" light black>
            Nueva categoria
        </x-wire-button>
    </x-slot>
    @livewire('admin.datatables.category-table')
</x-admin-layout>