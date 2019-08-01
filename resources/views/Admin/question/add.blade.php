@extends('Admin.master')

@section('title', trans('page.question.add_question'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('questions.index') }}">{{ trans('page.question.list_questions') }}</a></li>
    <li class="active">{{ trans('page.question.add_question') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('questions.store') }}">
                @csrf

                <fieldset class="content-group">
                    <legend class="text-bold">{{ trans('page.question.add_question') }}</legend>

                    <div class="form-group">
                        <div class="alert alert-info mb-10 pb-5 pl-10">
                            <div class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                                <label class="control-label col-lg-1">{{ trans('page.question.code') }}</label>
                                <div class="col-lg-11">
                                    <input name="code" type="text" class="form-control">
                                    @if(isset($errors) && $errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                                </div>
                            </div>

                            <div class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                                <label class="control-label col-lg-1">{{ trans('page.question.suggest') }}</label>
                                <div class="col-lg-11">
                                    <input name="content_suggest" type="text" class="form-control">
                                    @if(isset($errors) && $errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                                </div>
                            </div>

                            <div class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                                <label class="control-label col-lg-1">{{ trans('page.question.content') }}</label>
                                <div class="col-lg-11">
                                    <input name="content" type="text" class="form-control" placeholder="{{ trans('page.question.content_default') }}"">
                                    @if(isset($errors) && $errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-1">{{ trans('page.question.question_type') }}</label>
                                <div class="col-lg-11">
                                    <select id="question_type" name="question_type" class="form-control">
                                        <option value="1">Text</option>
                                        <option value="2">Image</option>
                                        <option value="3">Audio</option>
                                    </select>
                                </div>
                            </div>

                            <div id="div_image" class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                                <label class="control-label col-lg-1">{{ trans('page.question.image') }}</label>
                                <div class="col-lg-4">
                                    <input name="image" type="file" class="file-input" data-show-caption="false" data-show-upload="false"
                                           data-browse-class="btn btn-primary btn-sm" data-remove-class="btn btn-default btn-sm" accept="image/*">
                                </div>
                            </div>

                            <div id="div_audio" class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                                <label class="control-label col-lg-1">{{ trans('page.question.audio') }}</label>
                                <div class="col-lg-4">
                                    <input name="audio" type="file" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                @for($i = 1; $i <= 4; $i++)
                                    <div class="col-md-12 mt-20">
                                        <div class="col-md-1">
                                            <div class="icheck-material-red pl-10">
                                                <input type="radio" id="answer_{{ $i }}" name="key" value="{{ $i }}"/>
                                                <label for="answer_{{ $i }}"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-11">
                                            <input name="answer_content_{{ $i }}" type="text" class="form-control">
                                            <input name="answer_file_{{ $i }}" type="file" class="file-input" data-show-caption="false" data-show-upload="false"
                                                   data-browse-class="btn btn-primary btn-sm" data-remove-class="btn btn-default btn-sm" accept="image/*" />
                                        </div>
                                    </div>

                                    @if($i == 2)
                            </div>
                            <div class="col-md-6">
                                @endif
                                @endfor
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
    <script type="text/javascript" src="{{ asset('Admin/assets/js/add_question.js') }}"></script>
@endsection
