<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuggestionMenuModels;

class SuggestionMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'menu' => '2 lembar roti gandum',
                'calories' => 190
            ],
            [
                'menu' => '4 putih telur rebus',
                'calories' => 68
            ],
            [
                'menu' => '1 buah jeruk kecil',
                'calories' => 31
            ],
            [
                'menu' => '250gram  yogurt rendah lemak',
                'calories' => 180
            ],
            [
                'menu' => '250gram  yogurt rendah lemak',
                'calories' => 275
            ],
            [
                'menu' => '1 mangkuk kecil nasi merah',
                'calories' => 218
            ],
            [
                'menu' => '100 gram brokoli rebus',
                'calories' => 34
            ],
            [
                'menu' => '250 gram daging ayam atau sapi tanpa lemak',
                'calories' => 672
            ],
            [
                'menu' => '1 porsi salad campuran selada dan tomat',
                'calories' => 78
            ],

        ];

        $suggestionMenu = SuggestionMenuModels::insert($data);
    }
}
