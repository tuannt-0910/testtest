<?php

namespace App\Services;

use App\Repositories\Contracts\FileRepositoryInterface as FileRepository;
use App\Repositories\Contracts\TestQuestionRepositoryInterface as TestQuestionRepository;
use App\Imports\QuestionImport;
use Excel;
use Exception;

class ExcelService
{
    protected $testQuestionRepository;

    protected $fileRepository;

    public function __construct(
        FileRepository $fileRepository,
        TestQuestionRepository $testQuestionRepository
    ) {
        $this->fileRepository = $fileRepository;
        $this->testQuestionRepository = $testQuestionRepository;
    }

    public function importFileQuestion($request)
    {
        $questionImport = new QuestionImport();
        $selected_tests = $request->selected_tests ?? [];

        try {
            Excel::import($questionImport, $request->file('file_import'));
        } catch (Exception $exception) {
            return redirect()->back()->with('action_fault', config('constant.action_fault'));
        }

        $this->fileRepository->saveSingleAudio($request->file('file_import'), 'importQuestion');

        foreach ($selected_tests as $test_id) {
            foreach ($questionImport->datas as $question) {
                $testQuestion = [
                    'test_id' => $test_id,
                    'question_id' => $question->id
                ];

                $this->testQuestionRepository->create($testQuestion);
            }
        }
    }
}
