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
                'content' => 'It\'s _____ usual for all of us to have our own peculiar fears, for example being anxious around snakes.',
                'code' => 'ABC-123',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'The system aims to give everyone _____ opportunity at the beginning of their lives.',
                'code' => 'AB2C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'The news of her failure was not _____ unexpected, considering how ill she had been.',
                'code' => 'A2BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'He got the job on the _____ of his excellent qualifications.',
                'code' => 'AB3C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Elliot has _____ experience of repairing computers.',
                'code' => 'A4BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'I ran to the station in order to _____ getting too wet in the rain.',
                'code' => 'AB5C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'The organizers cancelled the conference because by the closing date _____ had enrolled.',
                'code' => 'A5BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'David has never been _____ in football. He prefers basketball.',
                'code' => 'AB6C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'You can now receive your bank statement online at the _____ of a button',
                'code' => 'A6BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'I was allowed to leave early _____ I did the work the following day.',
                'code' => 'AB8C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Mr Davis, I _____ a message for you earlier from Mr Lewis.',
                'code' => 'A8BC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'For many young people sport is a popular part of school life and _____ in one of the school teams is very important.',
                'code' => 'AB0C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'I\'ve heard a lot about you. It\'s a real pleasure _____ you at last.',
                'code' => 'AB1C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'I\'d like to return this book because some of the pages are _____',
                'code' => 'AsB1C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'The hotel is closed for repairs _____ the end of February.',
                'code' => 'AfB1C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'As a young boy, Tom was shy and had _____ in finding friends.',
                'code' => 'Af1C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Brian didn\'t _____ what kind of present to get his sister.',
                'code' => 'Af12C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'When Pam is older, she hopes that she can _____ some money from taking photos.',
                'code' => 'Af12C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'We never go swimming in the sea at night. It\'s _____ because the ships can\'t see you.',
                'code' => '2Af12C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Miriam Smith _____ to university for the first time on Monday.',
                'code' => '23Af12C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Some managers are supposed to meet each other at the end of the month to talk ___ their monthly performance reviews.',
                'code' => '23adfsC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'People can obtain information....... an article containing several cases of the implementation of the new technology and its impact.',
                'code' => 'dsdassC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => '—- — we are under a tight deadline on product delivery, we will have to ask for assistance from other departments.',
                'code' => '45dassC-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'We are sorry to announce that we will not ..... any credit cards starting next year since a cash deposit is required.',
                'code' => '2ds2C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'The chairperson was trying to curtail a lengthy, heated discussion........ the merits of work ethics due to the time constraint.',
                'code' => '2d12C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Many on-line retailers state that it is...... than they expected to set prices that attract more customers while boosting their profit margins.',
                'code' => '4345C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'Enclosed is a----- of the company’s current activities and future plans, so read it carefully and leave your comments on it',
                'code' => '43thj5C-12',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'The revised version of an unpublished manuscript-------- due to arrive this morning at 10 o’clock, but unexpected problems delayed the shipping.',
                'code' => '43tfew',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => '---- searching for long-term economic growth, the government intends to study immediate solutions to avoid severe criticism from the public.',
                'code' => 'e43tfew',
            ],
            [
                'question_type' => 'text',
                'content_suggest' => 'Chon phuong an dung',
                'content' => 'The company you work for is willing to take advantage of new technology, but......... are concerned about adverse consequences',
                'code' => '453hjew',
            ],
        ];
        foreach ($data as $item) {
            Question::create($item);
        }
    }
}
