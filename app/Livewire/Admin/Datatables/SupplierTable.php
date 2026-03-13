<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Builder;

class SupplierTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Supplier::query()
            ->with('identity');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Tipo Doc.", "identity.name")
            ->searchable()
                ->sortable(),
            Column::make("Número Doc.", "document_number")
            ->searchable()
                ->sortable(),
            Column::make("Nombre", "name")
            ->searchable()
                ->sortable(),
            Column::make("Dirección", "address")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Teléfono", "phone")
                ->sortable(),
            Column::make("Acciones")
            ->label(function($row){
                return view('admin.suppliers.actions', ['supplier' => $row]);
            })
                
        ];
    }
}
