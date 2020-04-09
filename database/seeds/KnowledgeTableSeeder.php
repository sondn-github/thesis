<?php

use Illuminate\Database\Seeder;

class KnowledgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('knowledge')->insert([
            [
                'id' => 1,
                'premise' => '{"0":"7,>=,0.7"}',
                'conclusion' => '20',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 2,
                'premise' => '{"0":"7,<,0.7"}',
                'conclusion' => '14',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 3,
                'premise' => '{"0":"6,>=,0.7"}',
                'conclusion' => '19',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 4,
                'premise' => '{"0":"6,<,0.7"}',
                'conclusion' => '13',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 5,
                'premise' => '{"0":"5,>=,0.7"}',
                'conclusion' => '18',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 6,
                'premise' => '{"0":"4,<,0.7"}',
                'conclusion' => '11',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 7,
                'premise' => '{"0":"3,>=,0.7"}',
                'conclusion' => '16',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 8,
                'premise' => '{"0":"3,>=,0.7"}',
                'conclusion' => '17',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 9,
                'premise' => '{"0":"3,<,0.7"}',
                'conclusion' => '9',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 10,
                'premise' => '{"0":"3,<,0.7"}',
                'conclusion' => '10',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 11,
                'premise' => '{"0":"2,>=,0.7","1":"4,>=,0.6"}',
                'conclusion' => '6',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 12,
                'premise' => '{"0":"2,<,0.7"}',
                'conclusion' => '4',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 13,
                'premise' => '{"0":"2,<,0.7"}',
                'conclusion' => '5',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 14,
                'premise' => '{"0":"2,<,0.7"}',
                'conclusion' => '6',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 15,
                'premise' => '{"0":"1,>=,0.7"}',
                'conclusion' => '2',
                'reliability' => 0.8,
                'type' => 1,
            ],
            [
                'id' => 16,
                'premise' => '{"0":"1,0.8,1.0","1":"2,0.9,1.0","2":"3,1.0,1.0"}',
                'conclusion' => '21',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 17,
                'premise' => '{"0":"4,0.7,0.8"}',
                'conclusion' => '22',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 18,
                'premise' => '{"0":"5,0.8,1.0","1":"6,0.6,0.8"}',
                'conclusion' => '24',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 19,
                'premise' => '{"0":"7,0.4,0.6"}',
                'conclusion' => '25',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 20,
                'premise' => '{"0":"7,0.7,0.8"}',
                'conclusion' => '26',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 21,
                'premise' => '{"0":"9,0.7,1.0"}',
                'conclusion' => '28',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 22,
                'premise' => '{"0":"10,0.7,1.0"}',
                'conclusion' => '29',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 23,
                'premise' => '{"0":"11,0.7,1.0"}',
                'conclusion' => '30',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 24,
                'premise' => '{"0":"12,0.7,1.0"}',
                'conclusion' => '31',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 25,
                'premise' => '{"0":"13,0.7,1.0"}',
                'conclusion' => '32',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 26,
                'premise' => '{"0":"13,0.7,1.0"}',
                'conclusion' => '33',
                'reliability' => 0.8,
                'type' => 2,
            ],
            [
                'id' => 27,
                'premise' => '{"0":"14,0.7,1.0"}',
                'conclusion' => '34',
                'reliability' => 0.8,
                'type' => 2,
            ],
        ]);
    }
}
