<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandSlider;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSlierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $brands = Brand::get();

        foreach ($brands as $item) {
            $name = $faker->name;

            BrandSlider::create([
                'brand_id' => $item->id,
                'brand_slider_name' => $name,
                'brand_slider' => $faker->imageUrl,
                'slug' => str::slug($name)
            ]);
        }

        
    }
}
