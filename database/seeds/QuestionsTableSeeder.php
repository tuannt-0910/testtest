<?php

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();
        $data = [
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => '1 con vit xoe ra (?) canh',
                'code' => 'ABC-123',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => '(?) con than lan con',
                'code' => 'AB2C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => '(?) tren mot chiec xe tang',
                'code' => 'A2BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Can I park here?',
                'code' => 'AB3C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'What colour will you paint the children\'s bedroom?',
                'code' => 'A4BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'I can\'t understand this email.',
                'code' => 'AB5C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'I\'d like two tickets for tomorrow night.',
                'code' => 'A5BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Shall we go to the gym now?',
                'code' => 'AB6C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Could you tell me your surname?',
                'code' => 'A6BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'This plant looks dead.',
                'code' => 'AB8C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'I hope it doesn\'t rain.',
                'code' => 'A8BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Are you going to come inside soon?',
                'code' => 'AB0C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Who gave you this book, Lucy?',
                'code' => 'AB1C-12',
            ],
            [
                'file_id' => 1,
                'question_type' => 'image',
                'content_suggest' => 'Chon phuong an dung',
                'code' => 'A4B51C-12',
            ],
            [
                'file_id' => 2,
                'question_type' => 'image',
                'content_suggest' => 'Chon phuong an dung',
                'code' => 'A4LB1C-12',
            ],
            [
                'file_id' => 3,
                'question_type' => 'image',
                'content_suggest' => 'Chon phuong an dung',
                'code' => 'A4B21C-12',
            ],
            [
                'file_id' => 4,
                'question_type' => 'audio',
                'content_suggest' => 'Chon phuong an dung',
                'code' => 'A4B2221C-12',
            ],
        ];
        foreach ($data as $item) {
            Question::create($item);
        }
    }
}
