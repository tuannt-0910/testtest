<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use App\Repositories\Eloquents\QuestionRepository;
use App\Repositories\Eloquents\AnswerRepository;

class QuestionImport implements OnEachRow
{
    public $datas = [];

    public function onRow(Row $row)
    {
        $questionRepository = new QuestionRepository();
        $answerRepository = new AnswerRepository();

        $row = $row->toArray();
        $question = [
            'code' => $row[0],
            'question_type' => $row[1],
            'content_suggest' => $row[2],
            'content' => $row[3],
        ];
        $question = $questionRepository->create($question);

        for ($index = 4; $index < 8; $index++) {
            $answer = [
                'question_id' => $question->id,
                'content' => $row[$index],
                'answer_type' => 'text',
                'correct_answer' => (3 + $row[8]) == $index ? 1 : 0,
            ];

            if ($answer['content']) {
                $answerRepository->create($answer);
            }
        }

        array_push($this->datas, $question);
    }
}
