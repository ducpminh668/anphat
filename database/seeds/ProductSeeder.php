<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Vòi xịt vệ sinh',
            'barcode' => '8KYUM83d',
            'manufacturer' => 'Việt Nam',
            'thumbnail' => '/storage/uploads/182530546_2450165001795654_7361982886996531706_n.jpg',
            'quantity' => 0,
            'cost_price' => 0,
            'sell_price' => 120000,
            'category_id' => 1
        ]);
    }
}
