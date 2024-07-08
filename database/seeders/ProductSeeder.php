<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductUnit;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $brandIds = Brand::pluck('id')->all(); // Get all brand IDs






        for ($i = 0; $i < 100; $i++) {
            $productName = $faker->sentence(3);


            $price = $faker->randomFloat(2, 100, 500); // Price between 100 and 500
            $discount_percentage = $faker->numberBetween(1, 50); // Discount between 0% and 50%
            $discount_amount = $price * $discount_percentage / 100;
            $discount_price = round($price - $discount_amount);

            $product = Product::create([
                'brand_id' => $faker->randomElement($brandIds),
                'title' => $productName,
                'slug' => Str::slug($productName),
                'quantity' => $faker->numberBetween(1, 100),
                'short_description' => $faker->sentence(10),
                'long_description' => $faker->paragraphs(3, true),
                'published' => $faker->boolean,
                'unit_quantity' => $faker->numberBetween(1, 5),
                'price' => $price,
                'discount_percentage' => $discount_percentage,
                'discount_price' => $discount_price,
                'discount_amount'=> $discount_amount
            ]);

            $category = Category::pluck('id')->all();
            $product->categories()->attach($faker->randomElement($category));


            $units = ProductUnit::pluck('id')->all();
            $product->productUnits()->attach($faker->randomElement($units));

        }



    }
}
