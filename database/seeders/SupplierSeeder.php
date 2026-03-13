<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'identity_id' => 1,
                'document_number' => '5432167890101',
                'name' => 'Distribuidora del Pacífico Sur S.A.',
                'address' => 'Zona 12, Ciudad',
                'email' => 'ventas@distribuidorapacifico.com',
                'phone' => '11223344',
            ],
            [
                'identity_id' => 1,
                'document_number' => '8765432109876',
                'name' => 'Importadora y Exportadora Global',
                'address' => 'Zona 4, Ciudad',
                'email' => 'contacto@globalimport.com',
                'phone' => '55667788',
            ],
            [
                'identity_id' => 1,
                'document_number' => '1234598765432',
                'name' => 'Comercializadora El Quetzal',
                'address' => 'Zona 1, Quetzaltenango',
                'email' => 'info@comercialquetzal.com',
                'phone' => '99887766',
            ]
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
