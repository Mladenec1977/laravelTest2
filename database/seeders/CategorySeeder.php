<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $category = [
                ['title' => 'Комедия'],
                ['title' => 'Драма'],
                ['title' => 'Мелодрама'],
                ['title' => 'Боевик'],
                ['title' => 'Фантастика'],
                ['title' => 'Триллер'],
                ['title' => 'Криминал'],
                ['title' => 'Детектив'],
                ['title' => 'Приключения'],
                ['title' => 'Семейный'],
                ['title' => 'Анимация']
            ];

            DB::table('categories')->insert($category);
        }
    }
}
