<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronica',
                'description' => 'Productos electrónica',
            ],
            [
                'name' => 'Ropa',
                'description' => 'Productos de ropa',
            ],
            [
                'name' => 'Alimentos',
                'description' => 'Productos alimenticios',
            ],
        ];
            foreach ($categories as $category){
                Category::firstOrCreate(['name' => $category['name']], $category);
            };
    }
}
