<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('courses')->insert([
            [
                'id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'user_id' => 3,
                'category_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Tin học đại cương',
                'user_id' => 3,
                'category_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Kiến trúc máy tính',
                'user_id' => 3,
                'category_id' => 1,
            ],
        ]);
    }
}
