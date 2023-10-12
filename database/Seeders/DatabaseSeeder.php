<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin1',
                'email' => 'admin1@example.com',
                'access_level' => 2,
                'password' => Hash::make('admin')
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'access_level' => 1,
                'password' => Hash::make('user')
            ]
        ]);
    }
}
