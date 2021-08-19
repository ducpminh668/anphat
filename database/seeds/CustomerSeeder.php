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
        CustomerGroup::create([
            'name' => 'Đại lý câp 1'
        ]);

        Customer::create([
            'name' => 'Nguyen Ba Ngoc',
            'phone' => '098878828',
            'address' => 'Ngoc Ha - Ba Dinh - Ha Noi',
            'user_id' => 1,
            'group_id' => 1
        ]);
        Customer::create([
            'name' => 'Phạm Minh Đức',
            'phone' => '0944376362',
            'address' => 'Ngoc Ha - Ba Dinh - Ha Noi',
            'user_id' => 1,
            'group_id' => 2
        ]);
    }
}
