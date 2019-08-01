@extends('Admin.master')

@section('title', trans('page.question.show_question'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('questions.index') }}">{{ trans('page.question.list_questions') }}</a></li>
    <li class="active">{{ trans('page.question.show_question') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <fieldset class="content-group">
                <legend class="text-bold">{{ trans('page.question.show_question') }} - {{ $question->code }}</legend>

                @if(Session::has('success'))
                    <div class="form-group">
                        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('success') }}</span>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <div class="alert alert-info mb-10 pb-5 pl-10">
                        <a href="{{ route('questions.edit', ['id' => $question->id]) }}" type="button" class="close"><i class="icon-pencil7"></i></a>
                        <label class="text-semibold">
                            {{ trans('page.test.question') }} ({{ $question->code }}): <span class="{{ Config('constant.color.' . $question->question_type) }}">{{ $question->question_type }}</span>
                            {{ $question->content }}
                        </label><br/>
                        <label class="text-semibold">{{ trans('page.test.content_guide') }}: {{ $question->content_suggest }}</label><br/>
                    </div>

                    <div class="row pr-15">
                        <button type="button" class="btn btn-default btn-sm close" data-toggle="modal" data-target="#modal_default">
                            <i class="icon-comments"></i>
                        </button>
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

                    <div id="modal_default" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">{{ trans('page.question.comments') }}</h5>
                                    @csrf
                                </div>

                                <div class="modal-body">
                                    <div id="messages">
                                        @foreach($question->comments as $comment)
                                            <div class="message_{{ $comment->id }}">
                                                <h6 class="text-semibold">{{ $comment->user->username }} -
                                                    <span class="content-group-sm text-muted">{{ $comment->created_at }}</span>
                                                    <a href="{{ route('comments.destroy', ['id' => $comment->id]) }}"
                                                       data-urlDestroy="{{ route('comments.destroy', ['id' => $comment->id]) }}"
                                                       type="button" class="close"><i class="icon-bin2"></i></a>
                                                </h6>
                                                <p>{{ $comment->content }}</p>

                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if(count($question->comments) == 0)
                                        <h6 class="text-semibold">{{ trans('page.question.no_comments') }}</h6>
                                    @else
                                        <textarea id="content_message" rows="5" cols="5" class="form-control"
                                                  placeholder="{{ trans('page.question.default_text_comment') }}"></textarea>
                                        <button id="send_message" data-urlStore="{{ route('comments.store') }}"
                                                data-question_id="{{ $question->id }}"
                                                type="button" class="btn btn-primary">{{ trans('page.question.send') }}</button>
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">{{ trans('page.question.close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('Admin/assets/js/comment.js') }}"></script>
@endsection
