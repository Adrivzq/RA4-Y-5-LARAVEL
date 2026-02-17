<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3, true), // Nombre de película
                'year' => $faker->numberBetween(1980, 2024),
                'genre' => $faker->randomElement(['Action', 'Comedy', 'Drama', 'Horror', 'Sci-Fi', 'Romance']),
                'country' => $faker->country(),
                'duration' => $faker->numberBetween(80, 180), // minutos
                'img_url' => $faker->imageUrl(640, 480, 'movies', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}