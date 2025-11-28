<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

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

    //Accesores
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->images()->count() ? Storage::url($this->images()->first()->path) : 'https://dicesabajio.com.mx/wp-content/uploads/2021/06/no-image.jpeg',
        );
    }
    
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
