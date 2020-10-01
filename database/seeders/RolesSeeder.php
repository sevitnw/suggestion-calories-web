<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'user',
                'guard_name' => 'user'
            ]
        ];
        $roles = Role::insert($roles);
    }
}
