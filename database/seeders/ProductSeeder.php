<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Producto 1',
                'description' => 'Descripcion del producto 1',
                'sku' => 'SKU1',
                'barcode' => 'barcode1',
                'price' => 10.00,
                'category_id' => 1,
            ],
            [
                'name' => 'Producto 2',
                'description' => 'Descripcion del producto 2',
                'sku' => 'SKU2',
                'barcode' => 'barcode2',
                'price' => 20.00,
                'category_id' => 2,
            ],
            [
                'name' => 'Producto 3',
                'description' => 'Descripcion del producto 3',
                'sku' => 'SKU3',
                'barcode' => 'barcode3',
                'price' => 30.00,
                'category_id' => 3,
            ],
        ];
            foreach ($products as $product){
                $categoryName = match($product['category_id']) {
                    1 => 'Electronica',
                    2 => 'Ropa',
                    3 => 'Alimentos',
                    default => 'Electronica',
                };
                
                $category = Category::where('name', $categoryName)->first();
                
                if ($category) {
                    $product['category_id'] = $category->id;
                    Product::firstOrCreate(['sku' => $product['sku']], $product);
                }
            };
    }
}