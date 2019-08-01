<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use App\Repositories\Contracts\QuestionRepositoryInterface as QuestionRepository;
use App\Repositories\Contracts\AnswerRepositoryInterface as AnswerRepository;

class QuestionImport implements OnEachRow
{
    protected $questionRepository;

    protected $answerRepository;

    /**
     * QuestionImport constructor.
     * @param $questionRepository
     */
    public function __construct(
        QuestionRepository $questionRepository,
        AnswerRepository $answerRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    /**
     * @param Row $row
     */
    public function onRow(Row $row)
    {
        $row = $row->toArray();
        $question = [
            'code' => $row[1],
            'question_type' => $row[2],
            'content_suggest' => $row[3],
            'content' => $row[4],
        ];
        $question = $this->questionRepository->create($question);

        for ($index = 5; $index < 9; $index++) {
            $answer = [
                'question_id' => $question->id,
                'content' => $row[$index],
                'answer_type' => 'text',
                'correct_answer' => (4 + $row[9]) == $index ? 1 : 0,
            ];
            $this->answerRepository->create($answer);
        }
    }
}
