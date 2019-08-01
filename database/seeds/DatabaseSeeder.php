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
        $this->call(UsersTableSeeder::class);
        $this->call(FileTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(TestsUserTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(TestQuestionTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
