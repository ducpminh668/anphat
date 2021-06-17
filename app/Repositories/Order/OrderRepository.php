<?php

namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;

class OrderRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Order::class;
    }
}
