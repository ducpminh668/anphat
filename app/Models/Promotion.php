<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['name', 'percent_amout', 'discount_amout', 'start_date', 'end_date', 'active'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
