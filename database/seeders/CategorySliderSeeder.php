<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\CategorySlider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = Category::all();

        foreach ($categories as $category) {
            $name = $faker->word;

            CategorySlider::create([
                'category_id' => $category->id,
                'cat_slider_name' => $name,
                'cat_slider' => $faker->imageUrl(),
                'slug' => Str::slug($name),
            ]);
        }
    }
}
