<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('types')->insert([
            [
                'id' => 1,
                'name' => 'Bộ tiêu chí ICT NewHouse',
                'is_using' => true,
            ],
            [
                'id' => 2,
                'name' => 'Bộ tiêu chí ĐHBKHN - 1',
                'is_using' => false,
            ],
            [
                'id' => 3,
                'name' => 'Bộ tiêu chí ĐHBKHN - 2',
                'is_using' => false,
            ],
        ]);
    }
}
