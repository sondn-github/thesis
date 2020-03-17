<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
               'id' => 1,
               'name' => 'Admin',
               'email' => 'admin@gmail.com',
               'password' => \Illuminate\Support\Facades\Hash::make('123456'),
               'role_id' => 4,
               'reliability' => 2,
            ],
            [
                'id' => 2,
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Teacher',
                'email' => 'teacher@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 3,
                'reliability' => 3,
            ],
            [
                'id' => 4,
                'name' => 'Expert',
                'email' => 'expert@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 2,
                'reliability' => 4,
            ],
        ]);
    }
}
