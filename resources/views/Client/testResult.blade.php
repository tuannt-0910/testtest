@extends('Client.master')

@section('title', trans('client.test.academics_test'))

@section('content')
    <div class="site-section pb-0"></div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>{{ trans('client.test.view_questions') }} {{ $test->name }}</span>
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="icon-book text-white"></span>
                        </div>
                        <div class="feature-1-content text-left pl-1 pr-1 pb-0">
                            @foreach($test->questions as $key => $question)
                                <div class="form-group">
                                    <div class="alert alert-info p-2">
                                        <label class="text-semibold">
                                            {{ trans('client.test.content_question') }} {{ $key + 1 }}: ({{ $question->code }}) {{ $question->content }}
                                        </label>
                                        @can('view-commands-client')
                                            <button type="button" class="btn btn-default btn-sm close text-danger"
                                                    data-toggle="modal" data-target="#modal_{{ $question->id }}">
                                                <i class="icon-comments"></i>
                                            </button>
                                        @endcan
                                    </div>

                                    <div class="row">
                                        @foreach($question->answers as $answer)
                                            <div class="col-md-6">
                                                <div class="icheck-material-green pl-2">
                                                    <input type="radio"
                                                           id="answer_{{ $answer->id }}"
                                                           disabled
                                                           @if($answer->correct_answer){{ 'checked' }}@endif
                                                    />
                                                    <label for="answer_{{ $answer->id }}">{{ $answer->content }}</label>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="col-md-12 text-center">
                                            @if(!count($question->answers))
                                                {{ trans('client.no_data') }}
                                            @endif
                                        </div>
                                    </div>

                                    @can('view-commands-client')
                                        @csrf
                                        <div id="modal_{{ $question->id }}" class="modal fade">
                                            <div class="modal-dialog mw-60">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="close">{{ trans('page.question.comments') }} - ({{ $question->code }})</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="messages">
                                                            @foreach($question->comments as $comment)
                                                                <div id="message_{{ $comment->id }}">
                                                                    <h6 class="text-semibold">{{ $comment->user->username }} -
                                                                        <span class="content-group-sm text-muted">{{ $comment->created_at }}</span>
                                                                    </h6>
                                                                    <p>{{ $comment->content }}</p>

                                                                    <hr>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        @if(count($question->comments) == 0)
                                                            <h6 class="text-semibold">{{ trans('page.question.no_comments') }}</h6>
                                                        @endif

                                                        @can('add-command-client')
                                                            <textarea rows="5" cols="5" class="form-control content_message"
                                                                      placeholder="{{ trans('page.question.default_text_comment') }}"></textarea>
                                                            <button data-urlStore="{{ route('client.comment.post', ['question_id' => $question->id]) }}"
                                                                    data-question_id="{{ $question->id }}"
                                                                    type="button" class="btn btn-primary send_message">{{ trans('page.question.send') }}</button>
                                                        @endcan
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-dismiss="modal">{{ trans('page.question.close') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group text-center">
                            @if(!count($test->questions))
                                {{ trans('client.no_data') }}
                                <br>
                            @endif

                            <a href="{{ route('client.tests', ['category_id' => $test->category->id]) }}"
                               class="btn btn-primary btn-lg px-5">{{ trans('client.test.back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section pb-0"></div>
@endsection

@section('script')
    @cannot('view-admin')
        <script src="{{ asset('Client/js/tawk.to.js') }}"></script>
    @endcannot

    @can('add-command-client')
        <script type="text/javascript" src="{{ asset('Client/js/comment.js') }}"></script>
    @endcan
@endsection
