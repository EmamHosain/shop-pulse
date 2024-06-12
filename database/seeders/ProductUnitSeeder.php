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

        $units = ['kg', 'gm', 'pc'];
        $faker = Faker::create();

        foreach ($units as $item) {
            $productUnit = ProductUnit::create([
                'unit_name' => $item,
                'unit_value' => $faker->numberBetween(1, 5)
            ]);
            // $products = Product::pluck('id')->all();
            // $productUnit->products()->attach($faker->randomElement($products));
        }
    }
}
