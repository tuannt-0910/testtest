@extends('Admin.master')

@section('title', $test->name)

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('tests.index') }}">{{ trans('page.test.list_tests') }}</a></li>
    <li><a href="{{ route('tests.show', ['id' => $test->id]) }}">{{ $test->name }}</a></li>
    <li class="active">{{ trans('page.question.choose_question') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="">
                <fieldset class="content-group">
                    <legend class="text-bold">{{ $test->name }}</legend>

                    <p class="content-group">{{ trans('page.test.guide_choose_add_question') }}</p>

                    <div class="form-group">
                        <div class="col-lg-6">
                            <div class="col-lg-12 mb-10">
                                <div class="col-lg-8">
                                    <input id="keyword_search" data-urlSearch="{{ route('admin.question.search') }}" type="text" class="form-control"
                                           placeholder="{{ trans('page.question.code') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-bordered table-framed">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('page.question.code') }}</th>
                                            <th>{{ trans('page.question.content') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_questions"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label class="control-label col-lg-12 mb-10">{{ trans('page.test.selected_question') }}</label>
                            <div class="col-lg-12">
                                <table class="table table-bordered table-framed">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('page.question.code') }}</th>
                                            <th>{{ trans('page.test.index') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_selected_questions"></tbody>
                                </table>
                            </div>
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

@section('script')
    <script type="text/javascript" src="{{ asset('Admin/assets/js/choose_question.js') }}"></script>
@endsection
