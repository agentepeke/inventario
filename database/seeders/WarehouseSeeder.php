<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            'name' => 'Almacén Principal',
            'location' => 'Bodega Central, Zona 1',
        ]);

        Warehouse::create([
            'name' => 'Almacén Norte',
            'location' => 'Sucursal Norte, Av. Principal',
        ]);

        Warehouse::create([
            'name' => 'Almacén Sur',
            'location' => 'Sucursal Sur, Calle 10',
        ]);
    }
}
