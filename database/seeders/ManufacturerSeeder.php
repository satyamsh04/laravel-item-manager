<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   // <-- ADD THIS

class ManufacturerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('manufacturers')->insert([
            ['name' => 'Apple'],
            ['name' => 'Samsung'],
            ['name' => 'Sony'],
        ]);
    }
}
