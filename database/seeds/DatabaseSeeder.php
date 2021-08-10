<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder\LaratrustSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            \LaratrustSeeder::class,
            \CategorySeeder::class,
            // \ProductSeeder::class,
            // \ProductImageSeeder::class,
            \CustomerSeeder::class,
            \SupplierSeeder::class,
        ]);
    }
}
