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
            'thumbnail' => '/storage/uploads/4.jpg',
            'quantity' => 100,
            'cost_price' => 30000,
            'sell_price' => 120000
        ]);
    }
}
