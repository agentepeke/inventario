<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'sku',
        'barcode',
        'price',
        'category_id',
    ];
    
    //Relacion uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relacion muchos a muchos 
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class);
    }

    //Relacion polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
