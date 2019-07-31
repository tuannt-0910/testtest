<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TestQuestion;

class TestQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_question')->truncate();
        $data = [
            [
                'test_id' => 1,
                'question_id' => 1,
            ],
            [
                'test_id' => 1,
                'question_id' => 2,
            ],
            [
                'test_id' => 1,
                'question_id' => 3,
            ],
            [
                'test_id' => 1,
                'question_id' => 4,
            ],
            [
                'test_id' => 1,
                'question_id' => 5,
            ],
            [
                'test_id' => 1,
                'question_id' => 6,
            ],
            [
                'test_id' => 1,
                'question_id' => 7,
            ],
            [
                'test_id' => 1,
                'question_id' => 8,
            ],
            [
                'test_id' => 1,
                'question_id' => 9,
            ],
            [
                'test_id' => 1,
                'question_id' => 10,
            ],
            [
                'test_id' => 1,
                'question_id' => 11,
            ],
            [
                'test_id' => 1,
                'question_id' => 12,
            ],
            [
                'test_id' => 1,
                'question_id' => 13,
            ],
            [
                'test_id' => 1,
                'question_id' => 14,
            ],
            [
                'test_id' => 1,
                'question_id' => 15,
            ],
            [
                'test_id' => 1,
                'question_id' => 16,
            ],
            [
                'test_id' => 1,
                'question_id' => 17,
            ],
            [
                'test_id' => 2,
                'question_id' => 1,
            ],
            [
                'test_id' => 2,
                'question_id' => 2,
            ],
            [
                'test_id' => 3,
                'question_id' => 3,
            ],
        ];
        foreach ($data as $item) {
            TestQuestion::create($item);
        }
    }
}
