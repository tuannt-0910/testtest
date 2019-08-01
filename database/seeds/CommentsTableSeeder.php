<?php

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();
        $data = [
            [
                'question_id' => 1,
                'user_id' => 3,
                'content' => 'This is an example of how to write WSGI middleware with WebOb',
            ],
            [
                'question_id' => 1,
                'user_id' => 2,
                'content' => 'Every middleware needs an application (app) that it wraps',
            ],
            [
                'question_id' => 1,
                'user_id' => 3,
                'content' => 'This middleware also needs a location to store the comments',
            ],
            [
                'question_id' => 1,
                'user_id' => 2,
                'content' => 'The setup is all at the bottom of example.py, and looks like this',
            ],
            [
                'question_id' => 1,
                'user_id' => 3,
                'content' => 'While we\'ve created the class structure for the middleware,' .
                    ' it doesn\'t actually do anything. Here\'s a kind of minimal version' .
                    ' of the middleware (using WebOb)',
            ],
            [
                'question_id' => 1,
                'user_id' => 2,
                'content' => 'But it won\'t be as convenient later.',
            ],
        ];
        foreach ($data as $item) {
            Comment::create($item);
        }
    }
}
