<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Order extends Model
{
    use Filterable;

    protected $filterable = [
        'start_date', 'end_date', 'phone', 'status', 'contact_name', 'user_id',
    ];

    protected $fillable = ['phone', 'address', 'status', 'contact_name', 'user_id', 'customer_id', 'total', 'note', 'order_id', 'tax', 'total_due'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
