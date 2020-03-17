<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Lập trình',
            ],
            [
                'id' => 2,
                'name' => 'Đại cương',
            ],
            [
                'id' => 3,
                'name' => 'Triết học',
            ],
        ]);
    }
}
