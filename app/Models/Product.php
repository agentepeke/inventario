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
        return $this->hasMany(Inventory::class);
    }

    //Relacion muchos a muchos polimorfica 
    public function purchasesOrders()
    {
        return $this->morphedByMany(PurchaseOrder::class, 'productable');
    }

    public function quotes()
    {
        return $this->morphedByMany(Quote::class, 'productable');
    }

    //Relacion polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
