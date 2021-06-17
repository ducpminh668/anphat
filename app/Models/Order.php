<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['phone', 'address', 'status', 'contact_name', 'user_id', 'customer_id', 'total'];
}
