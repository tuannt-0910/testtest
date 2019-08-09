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
                'content' => 'quite',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 1,
                'content' => 'absolutely',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 1,
                'content' => 'really',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 1,
                'content' => 'truly',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 2,
                'content' => 'an equal',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 2,
                'content' => 'a level',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 2,
                'content' => 'a same',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 2,
                'content' => 'an associated',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 3,
                'content' => 'entirely',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 3,
                'content' => 'extremely',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 3,
                'content' => 'utterly',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 3,
                'content' => 'thoroughly',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 4,
                'content' => 'support',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 4,
                'content' => 'assistance',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 4,
                'content' => 'backing',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 4,
                'content' => 'basis',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 5,
                'content' => 'wide',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 5,
                'content' => 'extensive',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 5,
                'content' => 'large',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 5,
                'content' => 'plenty',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 6,
                'content' => 'oppose',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 6,
                'content' => 'stop',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 6,
                'content' => 'resist',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 6,
                'content' => 'avoid',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 7,
                'content' => 'somebody',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 7,
                'content' => 'nobody',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 7,
                'content' => 'anybody',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 7,
                'content' => 'nothing',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 8,
                'content' => 'eager',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 8,
                'content' => 'interested',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 8,
                'content' => 'keen',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 8,
                'content' => 'fond',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 9,
                'content' => 'force',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 9,
                'content' => 'depress',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 9,
                'content' => 'push',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 9,
                'content' => 'hit',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 10,
                'content' => 'even if',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 10,
                'content' => 'in case',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 10,
                'content' => 'providing',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 10,
                'content' => 'otherwise',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 11,
                'content' => 'make',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 11,
                'content' => 'put',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 11,
                'content' => 'did',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 11,
                'content' => 'took',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 12,
                'content' => 'taking',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 12,
                'content' => 'having',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 12,
                'content' => 'being',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 12,
                'content' => 'putting',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 13,
                'content' => 'to meet',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 13,
                'content' => 'to meeting',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 13,
                'content' => 'met',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 13,
                'content' => 'meet',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 14,
                'content' => 'hurt',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 14,
                'content' => 'injured',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 14,
                'content' => 'wounded',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 14,
                'content' => 'torn',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 15,
                'content' => 'by',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 15,
                'content' => 'within',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 15,
                'content' => 'on',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 15,
                'content' => 'until',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 16,
                'content' => 'fear',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 16,
                'content' => 'worry',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 16,
                'content' => 'problem',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 16,
                'content' => 'difficulty',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 17,
                'content' => 'know',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 17,
                'content' => 'understand',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 17,
                'content' => 'consider',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 17,
                'content' => 'think',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 18,
                'content' => 'bring',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 18,
                'content' => 'cost',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 18,
                'content' => 'take',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 18,
                'content' => 'earn',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 19,
                'content' => 'dangerous',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 19,
                'content' => 'dirty',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 19,
                'content' => 'dark',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 19,
                'content' => 'quiet',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 20,
                'content' => 'studied',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 20,
                'content' => 'arrived',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 20,
                'content' => 'was',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 20,
                'content' => 'went',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 21,
                'content' => 'under',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 21,
                'content' => 'about',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 21,
                'content' => 'along',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 21,
                'content' => 'into',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 22,
                'content' => 'growth',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 22,
                'content' => 'grows',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 22,
                'content' => 'grown',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 22,
                'content' => 'grower',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 23,
                'content' => 'where',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 23,
                'content' => 'while',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 23,
                'content' => 'from',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 23,
                'content' => 'wherever',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 24,
                'content' => 'Moreover',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 24,
                'content' => 'Because',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 24,
                'content' => 'Therefore',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 24,
                'content' => 'Nevertheless',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 25,
                'content' => 'accepts',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 25,
                'content' => 'accepting',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 25,
                'content' => 'accept',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 25,
                'content' => 'accepted',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 26,
                'content' => 'on',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 26,
                'content' => 'by',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 26,
                'content' => 'with',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 26,
                'content' => 'to',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 27,
                'content' => 'difficult',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 27,
                'content' => 'difficulty',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 27,
                'content' => 'more difficult',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 27,
                'content' => 'much difficult',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 28,
                'content' => 'total',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 28,
                'content' => 'product',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 28,
                'content' => 'registration',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 28,
                'content' => 'summary',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 29,
                'content' => 'was',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 29,
                'content' => 'were',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 29,
                'content' => 'is',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 29,
                'content' => 'are',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 30,
                'content' => 'total',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 30,
                'content' => 'product',
                'answer_type' => 'text',
                'correct_answer' => 1
            ],
            [
                'question_id' => 30,
                'content' => 'registration',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
            [
                'question_id' => 30,
                'content' => 'summary',
                'answer_type' => 'text',
                'correct_answer' => 0
            ],
        ];
        foreach ($data as $item) {
            Answer::create($item);
        }
    }
}
