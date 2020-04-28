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
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Teacher',
                'email' => 'teacher@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 3,
                'reliability' => 0.5,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Expert',
                'email' => 'expert@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 2,
                'reliability' => 1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Student5',
                'email' => 'student5@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 6,
                'name' => 'Student6',
                'email' => 'student6@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 7,
                'name' => 'Student7',
                'email' => 'student7@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 8,
                'name' => 'Student8',
                'email' => 'student8@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 9,
                'name' => 'Student9',
                'email' => 'student9@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
            [
                'id' => 10,
                'name' => 'Student10',
                'email' => 'student10@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role_id' => 1,
                'reliability' => 0.1,
                'avatar' => '/images/person_1.jpg',
            ],
        ]);
    }
}
