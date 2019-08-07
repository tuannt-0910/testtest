@extends('Admin.master')

@section('title', $test->name)

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('tests.index') }}">{{ trans('page.test.list_tests') }}</a></li>
    <li class="active">{{ $test->name }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <fieldset class="content-group">
                <legend class="text-bold">{{ $test->name }}</legend>

                @if(Session::has('success'))
                    <div class="form-group">
                        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('success') }}</span>
                        </div>
                    </div>
                @endif

                <div class="content-group-sm">
                    <h5 class="text-semibold no-margin">({{ $test->code }}) - {{ $test->name }}</h5>
                    <span class="display-block">
                        <label class="label label-default">{{ trans('page.test.category_parent') }} : {{ $test->category->name }}</label>
                        @if($test->free)<label class="label label-success">{{ trans('page.test.free') }}</label>@endif
                        @if($test->publish)<label class="label label-primary">{{ trans('page.test.publish') }}</label>@endif
                        <label class="label label-default">{{ $test->created_at }}</label>
                    </span>
                    <span class="display-block">{{ $test->content_guide }}</span>
                    <span class="display-block">{{ trans('page.test.number_questions') }} : {{ $test->total_question }} / {{ count($test->questions) }}</span>
                    <span class="display-block">{{ trans('page.test.execute_time') }} : {{ $test->execute_time }}'</span>
                </div>

                <div class="form-group">
                    <div class="text-right">
                        @can('add-question')
                            <a href="{{ route('questions.create') }}" class="btn btn-primary mr-5">{{ trans('page.question.create_question') }}</a>
                        @endcan
                        @can('choose-question-test')
                            <a href="{{ route('admin.questions.chooseAddQuestion', ['test_id' => $test->id]) }}" class="btn btn-default mr-5">{{ trans('page.question.choose_question') }}</a>
                        @endcan
                        @can('import-questions')
                            <a href="{{ route('admin.questions.getImport') }}" class="btn btn-success">{{ trans('page.question.import_question') }}</a>
                        @endcan
                    </div>
                </div>
                <hr />

                @foreach($questions as $key => $question)
                    <div class="form-group">
                        <div class="alert alert-info mb-10 pb-5 pl-10">
                            <a href="{{ route('questions.edit', ['id' => $question->id]) }}" type="button" class="close"><i class="icon-pencil7"></i></a>
                            <label class="text-semibold">{{ trans('page.test.question') }} {{ $key + 1 }} - {{ $question->code }}: {{ $question->content }}</label>
                        </div>

                        <div class="row">
                            @foreach($question->answers as $answer)
                                <div class="col-md-6">
                                    <div class="icheck-material-red pl-10">
                                        <input type="radio" id="answer_{{ $answer->id }}" name="question_{{ $question->id }}"
                                               disabled @if($answer->correct_answer == 1){{ 'checked' }}@endif/>
                                        <label for="answer_{{ $answer->id }}">{{ $answer->content }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                {{ $questions->links() }}

                @if(!count($questions))
                    <div class="form-group">
                        <div class="alert alert-danger mb-10 pb-5 pl-10">
                            <label class="text-semibold">{{ trans('page.test.no_questions') }}</label>
                        </div>
                    </div>
                @endif
            </fieldset>
        </div>
    </div>
@endsection

