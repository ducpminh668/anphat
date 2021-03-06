<?php

namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }
}
