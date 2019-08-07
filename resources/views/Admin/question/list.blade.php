@extends('Admin.master')

@section('title', trans('page.question.list_questions'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.question.list_questions') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <fieldset class="content-group">
                <legend class="text-bold">{{ trans('page.question.list_questions') }}</legend>

                <div class="form-group">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('success') }}</span>
                        </div>
                    @endif

                    <div class="col-lg-12 text-right">
                        @can('add-question')
                            <a href="{{ route('questions.create') }}" class="btn btn-primary">{{ trans('page.question.create_question') }}</a>
                        @endcan
                        @can('import-questions')
                            <a href="{{ route('admin.questions.getImport') }}" class="btn btn-success">{{ trans('page.question.import_question') }}</a>
                        @endcan
                    </div>
                </div>
                <input id="route_getDatas" type="hidden" value="{{ route('admin.questions.getQuestions') }}">
            </fieldset>

            <table class="table table-bordered" id="list_questions_table">
                <thead>
                <tr>
                    <th>{{ trans('page.question.code') }}</th>
                    <th>{{ trans('page.question.content') }}</th>
                    <th>{{ trans('page.question.suggest') }}</th>
                    <th>{{ trans('page.question.type') }}</th>
                    <th>{{ trans('page.test.created_at') }}</th>
                    @if(Auth::user()->can('edit-question') || Auth::user()->can('remove-question'))
                        <th>{{ trans('page.test.actions') }}</th>
                    @endif
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('Admin/assets/js/list_question.js') }}"></script>
@endsection
