<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Nguyen Ba Ngoc',
            'phone' => '098878828',
            'address' => 'Ngoc Ha - Ba Dinh - Ha Noi',
        ]);
    }
}
