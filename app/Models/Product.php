<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'manufacturer', 'barcode', 'thumbnail', 'quantity', 'sell_price', 'cost_price'];
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function promotions()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
