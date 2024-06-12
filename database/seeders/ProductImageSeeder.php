<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $faker = Faker::create();
        $products = Product::get();

        foreach ($products as $item) {
            ProductImage::create([
                'product_id' => $item->id,
                'image' => $faker->imageUrl
            ]);
        }

    }
}
