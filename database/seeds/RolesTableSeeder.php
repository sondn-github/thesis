<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'student',
                'display_name' => 'Student',
                'description' => 'Student',
            ],
            [
                'id' => 2,
                'name' => 'expert',
                'display_name' => 'Expert',
                'description' => 'Expert',
            ],
            [
                'id' => 3,
                'name' => 'teacher',
                'display_name' => 'Teacher',
                'description' => 'Teacher',
            ],
            [
                'id' => 4,
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Admin',
            ],
        ]);
    }
}
