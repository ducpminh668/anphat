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
            'image' => 'https://media3.scdn.vn/img4/2021/04_11/3k5VkNTFTw5A0KFwGMk3_simg_de2fe0_320x320_maxb.jpg',
        ]);
        ProductImage::create([
            'product_id' => $id,
            'image' => 'https://media3.scdn.vn/img4/2021/04_11/soi3O1vrLUTAxaHlLUDQ_simg_de2fe0_320x320_maxb.jpg',
        ]);
    }
}
