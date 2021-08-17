<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\CustomerGroup;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CustomerGroup::create([
            'name' => 'Khách lẻ'
        ]);

        Customer::create([
            'name' => 'Nguyen Ba Ngoc',
            'phone' => '098878828',
            'address' => 'Ngoc Ha - Ba Dinh - Ha Noi',
            'user_id' => 1,
            'group_id' => 1
        ]);
    }
}
