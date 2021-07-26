<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'phone', 'address', 'note', 'user_id', 'type'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
