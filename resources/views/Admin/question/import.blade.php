@extends('Admin.master')

@section('title', trans('page.question.import_question'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('questions.index') }}">{{ trans('page.question.list_questions') }}</a></li>
    <li class="active">{{ trans('page.question.import_question') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.questions.postImport') }}" enctype="multipart/form-data">
                @csrf

                <fieldset class="content-group">
                    <legend class="text-bold">{{ trans('page.question.import_question') }}</legend>

                    @if(Session::has('action_fault'))
                        <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('action_fault') }}</span>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label ml-20">{{ trans('page.question.import_to_tests') }}</label>
                        <select name="selected_tests[]" multiple="multiple" class="form-control listbox">
                            @foreach($tests as $test)
                                <option value="{{ $test->id }}" @if(isset($selected_test) && $selected_test->id == $test->id){{ 'selected' }}@endif>
                                    {{ $test->name }} ({{$test->code}})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr />

                    <div class="form-group">
                        <label class="control-label col-lg-2">{{ trans('page.question.file_upload') }}</label>
                        <div class="col-lg-4">
                            <input name="file_import" type="file" class="file-input" data-show-caption="false"
                                   data-show-upload="false" data-browse-class="btn btn-primary btn-sm" data-remove-class="btn btn-default btn-sm">
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ trans('page.submit') }} <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
