<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name' => 'An Phát - Công ty sản xuất',
            'address' => 'Tổ 1 - Phương 12 - Tần Bình - TP Hồ Chí Minh',
            'phone' => '0889123123',
        ]);
    }
}
