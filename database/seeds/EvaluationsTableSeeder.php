<?php

use Illuminate\Database\Seeder;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('evaluations')->insert([
            [
                'user_id' => 1,
                'course_id' => 1,
                'answers' => '{"1":"3","2":"4","3":"4","4":"3","5":"4","6":"1","7":"2","8":"3","9":"4"}',
            ],
            [
                'user_id' => 2,
                'course_id' => 1,
                'answers' => '{"1":"1","2":"3","3":"2","4":"4","5":"1","6":"2","7":"3","8":"2","9":"3"}',
            ],
            [
                'user_id' => 3,
                'course_id' => 1,
                'answers' => '{"1":"3","2":"3","3":"3","4":"3","5":"3","6":"3","7":"3","8":"3","9":"3"}',
            ],
            [
                'user_id' => 4,
                'course_id' => 1,
                'answers' => '{"1":"2","2":"2","3":"2","4":"2","5":"2","6":"2","7":"2","8":"2","9":"2"}',
            ],
            [
                'user_id' => 5,
                'course_id' => 1,
                'answers' => '{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1"}',
            ],
        ]);
    }
}
