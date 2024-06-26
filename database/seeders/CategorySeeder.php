<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $boolean = [true, false];

        for ($i = 0; $i < 20; $i++) {
            $name = $faker->name;
            Category::create([
                'cat_name' => $name,
                'slug' => Str::slug($name),
                'cat_logo' => $faker->imageUrl,
                'published' => $faker->randomElement($boolean),
                'cat_slider'=>$faker->imageUrl,
            ]);

        }

    }
}
