<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductUnit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $units = ['kg', 'gm', 'pcs'];
        $faker = Faker::create();
        foreach ($units as $item) {
            $productUnit = ProductUnit::create([
                'unit_name' => $item,
            ]);
        }
    }
}
