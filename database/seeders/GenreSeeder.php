<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $genre = [
                ['title' => 'Фильмы'],
                ['title' => 'Сериалы'],
                ['title' => 'Мультфильмы'],
                ['title' => 'Клипы'],
                ['title' => 'Трейлеры']
            ];

            DB::table('genres')->insert($genre);
        }
    }
}
