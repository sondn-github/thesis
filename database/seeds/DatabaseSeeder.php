<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(CriteriasTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(FactsTableSeeder::class);
        $this->call(KnowledgeTableSeeder::class);
        $this->call(EvaluationsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
