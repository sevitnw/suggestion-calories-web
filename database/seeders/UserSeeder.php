<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@sgcalories.com',
                'password' => Hash::make('Password122'),
            ],
            [
                'name' => 'Sevi Trisnowati',
                'email' => 'sevitnw@sgcalories.com',
                'password' => Hash::make('Password122'),
            ],
        ];
        $users = User::insert($users);
    }
}
