<?php

namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;

class ProductImageRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ProductImage::class;
    }
}
