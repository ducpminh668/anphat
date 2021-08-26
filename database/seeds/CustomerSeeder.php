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
            'name' => 'Nhà phân phối'
        ]);
        CustomerGroup::create([
            'name' => 'Đại lý cấp 1'
        ]);
        CustomerGroup::create([
            'name' => 'Đại lý câp 2'
        ]);
    }
}
