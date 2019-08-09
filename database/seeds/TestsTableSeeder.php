<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->truncate();
        $data = [
            [
                'category_id' => 4,
                'created_user_id' => 1,
                'name' => 'Test Your English',
                'code' => 'HK-492',
                'content_guide' => 'Find out which course you should choose by answering our \'Test Your English\' questions.',
                'execute_time' => 1,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'Incomplete Sentence',
                'code' => 'HK-493',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 1,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 6,
                'created_user_id' => 1,
                'name' => '600 Essential Words for the TOEIC',
                'code' => 'HK-494',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 7,
                'created_user_id' => 1,
                'name' => 'Achieve TOEIC Bridge',
                'code' => 'HK-495',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 8,
                'created_user_id' => 1,
                'name' => 'Barron’s TOEIC Practice Exams',
                'code' => 'HK-496',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 9,
                'created_user_id' => 1,
                'name' => 'Collins’ Practice Test for the TOEIC Test',
                'code' => 'HK-497',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 10,
                'created_user_id' => 1,
                'name' => 'Oxford practice tests for the TOEIC test',
                'code' => 'HK-498',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 11,
                'created_user_id' => 1,
                'name' => 'Oxford Preparation Course',
                'code' => 'HK-499',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 12,
                'created_user_id' => 1,
                'name' => 'Pass the TOEIC Test Advanced',
                'code' => 'HK-490',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 13,
                'created_user_id' => 1,
                'name' => 'Pass the TOEIC Test Intermediate',
                'code' => 'HK-491',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 14,
                'created_user_id' => 1,
                'name' => 'Practice Examinations for the TOEIC Test',
                'code' => 'HK-429',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 15,
                'created_user_id' => 1,
                'name' => 'Practice Examinations',
                'code' => 'HK-439',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 16,
                'created_user_id' => 1,
                'name' => 'Tactics for TOEIC Listening',
                'code' => 'HK-459',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 17,
                'created_user_id' => 1,
                'name' => 'Reading Tests',
                'code' => 'HK-469',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 18,
                'created_user_id' => 1,
                'name' => 'Tactics for TOEIC Listening and Reading Tests',
                'code' => 'HK-489',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 19,
                'created_user_id' => 1,
                'name' => 'switchboard',
                'code' => 'HK-249',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 20,
                'created_user_id' => 1,
                'name' => 'systematic',
                'code' => 'HK-349',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 21,
                'created_user_id' => 1,
                'name' => 'support',
                'code' => 'HK-549',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 22,
                'created_user_id' => 1,
                'name' => 'supporter',
                'code' => 'HK-949',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 1,
                'created_user_id' => 1,
                'name' => 'surrounding',
                'code' => 'HK-649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 2,
                'created_user_id' => 1,
                'name' => 'suspicious',
                'code' => 'HK-1249',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 3,
                'created_user_id' => 1,
                'name' => 'transportation',
                'code' => 'HK-2349',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 4,
                'created_user_id' => 1,
                'name' => 'temporary',
                'code' => 'HK-5649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'unspoiled',
                'code' => 'HK-9649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'package',
                'code' => 'HK-649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'package tour',
                'code' => 'HK-96459',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'parcel',
                'code' => 'HK-9249',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'parking lot',
                'code' => 'HK-96749',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'participant',
                'code' => 'HK-96649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'particularly',
                'code' => 'HK-9639',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'passenger',
                'code' => 'HK-23649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'patent',
                'code' => 'HK-8549',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'patented',
                'code' => 'HK-93749',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'patience',
                'code' => 'HK-96259',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'payment',
                'code' => 'HK-239649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 1,
                'publish' => 1,
            ],
            [
                'category_id' => 5,
                'created_user_id' => 1,
                'name' => 'personalized',
                'code' => 'HK-289649',
                'content_guide' => 'Choose the word that best completes the sentence:',
                'execute_time' => 20,
                'total_question' => 20,
                'free' => 0,
                'publish' => 1,
            ],
        ];
        foreach ($data as $item) {
            Test::create($item);
        }
    }
}
