<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    public function run(): void
    {
        $films = DB::table('films')->pluck('id'); // Obtener IDs de films
        $actors = DB::table('actors')->pluck('id'); // Obtener IDs de actors
        
        // Relacionar cada película con 1-3 actores aleatorios
        foreach ($films as $filmId) {
            $numActors = rand(1, 3); // Entre 1 y 3 actores por película
            
            $randomActors = $actors->random($numActors);
            
            foreach ($randomActors as $actorId) {
                DB::table('films_actors')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}