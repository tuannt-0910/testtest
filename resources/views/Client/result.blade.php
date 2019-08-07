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

            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="icon-stars text-white"></span>
                        </div>
                        <div class="feature-1-content text-left pl-1 pr-1 pb-0">
                            <table class="table table-bordered table-framed mb-5">
                                <tbody>
                                    <tr>
                                        <th rowspan="2">
                                            <?php echo html_entity_decode(starNumber($test->score)) ?>
                                        </th>
                                        <th width="20%">{{ trans('client.test.score') }}</th>
                                        <th width="20%">{{ trans('client.test.questions') }}</th>
                                        <th width="20%">{{ trans('client.test.duration') }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ $test->score ?? 0 }}</th>
                                        <th>{{ $test->correctNumber }} / {{ $test->total_question }}</th>
                                        <th>{{ toMinutes($test->history->duration) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                            {{ trans('client.test.content_question') }} {{ $key + 1 }}:
                                            ({{ $question->code }}) {{ $question->content }}
                                            @if($question->correct)
                                                <i class="icon-check text-success"></i>
                                            @else
                                                <i class="icon-remove text-danger"></i>
                                            @endif
                                        </label>
                                    </div>

                                    <div class="row">
                                        @foreach($question->answers as $answer)
                                            <div class="col-md-6">
                                                <div class="
                                                    @if($answer->correct_answer)
                                                        {{ 'icheck-material-green ' }}
                                                    @elseif($answer->correct_answer != $question->chosen_answer)
                                                        {{ 'icheck-material-red ' }}
                                                    @else
                                                        {{ 'icheck-material-gray ' }}
                                                    @endif
                                                    pl-2
                                                    ">
                                                    <input type="radio" disabled
                                                        @if($answer->correct_answer || $question->chosen_answer == $answer->id)
                                                            {{ 'checked' }}
                                                        @endif
                                                    />
                                                    <label>{{ $answer->content }}</label>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section pb-0"></div>
@endsection

@section('script')
    <script src="{{ asset('Client/js/client.js') }}"></script>
@endsection