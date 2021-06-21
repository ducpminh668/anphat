<?php

namespace App\Repositories\Customer;

use App\Repositories\EloquentRepository;

class CustomerRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Customer::class;
    }
}
