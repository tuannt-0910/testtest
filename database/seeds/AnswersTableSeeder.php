<?php

use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->truncate();
        $data = [
            [
                'question_id' => 1,
                'content' => 'Sorry, I did that.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 1,
                'content' => 'It\'s the same place.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 1,
                'content' => 'Only for half an hour.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 2,
                'content' => 'I hope it was right.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 2,
                'content' => 'We can\'t decide.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 2,
                'content' => 'It wasn\'t very difficult.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 3,
                'content' => 'Would you like some help?',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 3,
                'content' => 'Don\'t you know?',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 3,
                'content' => 'I suppose you can.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 4,
                'content' => 'How much did you pay?',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 4,
                'content' => 'Afternoon and evening.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 4,
                'content' => '\'ll just check for you.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 5,
                'content' => 'I\'m too tired.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 5,
                'content' => 'It\'s very good.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 5,
                'content' => 'Not at all.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 6,
                'content' => 'Sorry, I did that.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 6,
                'content' => 'It\'s the same place.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 6,
                'content' => 'Only for half an hour.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 7,
                'content' => 'I hope it was right.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 7,
                'content' => 'We can\'t decide.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 7,
                'content' => 'It wasn\'t very difficult.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 8,
                'content' => 'Would you like some help?',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 8,
                'content' => 'Don\'t you know?',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 8,
                'content' => 'I suppose you can.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 9,
                'content' => 'How much did you pay?',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 9,
                'content' => 'Afternoon and evening.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 9,
                'content' => '\'ll just check for you.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 9,
                'content' => 'I\'m too tired.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 10,
                'content' => 'It\'s very good.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 10,
                'content' => 'Not at all.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 10,
                'content' => 'Sorry, I did that.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 10,
                'content' => 'It\'s the same place.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 11,
                'content' => 'Only for half an hour.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 11,
                'content' => 'I hope it was right.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 11,
                'content' => 'We can\'t decide.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 11,
                'content' => 'It wasn\'t very difficult.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 12,
                'content' => 'Would you like some help?',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 12,
                'content' => 'Don\'t you know?',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 12,
                'content' => 'I suppose you can.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 12,
                'content' => 'How much did you pay?',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 13,
                'content' => 'Afternoon and evening.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 13,
                'content' => '\'ll just check for you.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 13,
                'content' => 'I\'m too tired.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 14,
                'content' => 'It\'s very good.',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 14,
                'content' => 'Not at all.',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
        ];
        foreach ($data as $item) {
            Answer::create($item);
        }
    }
}
