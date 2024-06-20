<?php

namespace Database\Seeders;

use App\Models\Brand;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $brandName = $faker->company;
            Brand::create([
                'brand_name' => $brandName,
                'brand_logo'=>$faker->imageUrl,
                'slug' => Str::slug($brandName)
            ]);
        }
    }
}
