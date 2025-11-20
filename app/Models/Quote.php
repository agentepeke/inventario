<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'vouncher_type',
        'serie',
        'correlative',
        'date',
        'customer_id',
        'total',
        'observations',
    ];

    //Relacion uno a muchos inversa
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    //Relacion muchos a muchos polimorfica
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')
            ->withPivot('quantity', 'price', 'subtotal')
            ->withTimestamps();
    }
}
