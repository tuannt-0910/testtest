@extends('Client.master')

@section('title', trans('client.tests.academics_tests'))

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
                <div class="col-lg-9">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="icon-book text-white"></span>
                        </div>
                        <div class="feature-1-content text-left pl-1 pr-1">
                            <div class="form-group">
                                <div class="alert alert-info p-2">
                                    <label class="text-semibold">dfdfdfgdfg</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="icheck-material-red pl-2">
                                            <input type="radio" id="answer_1"/>
                                            <label for="answer_1">sdfsdf</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icheck-material-red pl-2">
                                            <input type="radio" id="answer_1"/>
                                            <label for="answer_1">sdfsdf</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icheck-material-red pl-2">
                                            <input type="radio" id="answer_1"/>
                                            <label for="answer_1">sdfsdf</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icheck-material-red pl-2">
                                            <input type="radio" id="answer_1"/>
                                            <label for="answer_1">sdfsdf</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="icon-timer text-white"></span>
                        </div>
                        <div class="feature-1-content text-left pl-1 pr-1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section pb-0"></div>
@endsection
