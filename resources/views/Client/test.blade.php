@extends('Client.master')

@section('title', trans('client.test.academics_test'))

@section('content')
    <div class="site-section pb-0"></div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>{{ $test->name }}</span>
                    </h2>
                </div>
            </div>

            <form id="form_test" action="{{ route('client.test.post', ['test_id' => $test->id]) }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-9">
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
                                        </div>

                                        <div class="row">
                                            @foreach($question->answers as $answer)
                                                <div class="col-md-6">
                                                    <div class="icheck-material-grey pl-2">
                                                        <input type="radio"
                                                               name="keyQuestions_{{ $question->id }}"
                                                               id="answer_{{ $answer->id }}"
                                                               value="{{ $answer->id }}"
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
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group text-center">
                                @if(count($test->questions))
                                    <input id="submit_form" type="submit" value="{{ trans('client.test.send') }}" class="btn btn-primary btn-lg px-5">
                                @else
                                    {{ trans('client.no_data') }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="duration" id="duration">

                    <div id="myHeader" class="col-lg-3">
                        <div class="feature-1 border position-fixed w-20">
                            <div class="icon-wrapper bg-primary">
                                <span class="icon-timer text-white"></span>
                            </div>
                            <div class="feature-1-content text-left pl-1 pr-1 background-primary">
                                <div id="clockDiv"
                                     data-execute_time="{{ $test->execute_time }}"
                                     data-test_id="{{ $test->id }}"
                                >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="site-section pb-0"></div>
@endsection

@section('script')
    <script src="{{ asset('Client/js/client.js') }}"></script>
@endsection
