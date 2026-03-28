<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;   // 👈 THIS was missing
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'TV', 'price' => 499.99, 'manufacturer_id' => 1],
            ['name' => 'Smartphone', 'price' => 999.99, 'manufacturer_id' => 2],
            ['name' => 'Refrigerator', 'price' => 799.50, 'manufacturer_id' => 3],
        ]);
    }
}
