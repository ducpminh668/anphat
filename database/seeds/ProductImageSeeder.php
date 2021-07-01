<?php

use Illuminate\Database\Seeder;
use App\Models\ProductImage;
use App\Models\Product;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Product::first()->id;
        ProductImage::create([
            'product_id' => $id,
            'image' => '/storage/uploads/5.jpg',
        ]);
        ProductImage::create([
            'product_id' => $id,
            'image' => '/storage/uploads/6.jpg',
        ]);
    }
}
