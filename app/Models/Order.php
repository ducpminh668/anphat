<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Order extends Model
{
    use Filterable;

    protected $fillable = ['phone', 'address', 'status', 'contact_name', 'user_id', 'customer_id', 'total'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
