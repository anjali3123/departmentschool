<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Anjali',
                'username' => 'anjali',
                'phoneno' => '8527416350',
                'email' => 'anjali@mailinator.com',
                'isDeleted' => '0',
                'status' => '1',
                'departmentid' => '1',
                'password' => '$2y$10$aIYlDRUI9pExVbwNmJ2RB.E298PQifrC6WwZvhRapzzHKp4w0kALi',
                'remember_token' => '',
            ]
        ]);
    }
}
