@extends('Client.master')

@section('title', trans('client.ranking.academics_ranking'))

@section('content')
    <div class="site-section pb-0"></div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>{{ trans('client.ranking.ranking') }}</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="flaticon-mortarboard text-white"></span>
                        </div>
                        <div class="feature-1-content">
                            <form class="row mb-4">
                                <div class="col-lg-4"></div>

                                <div class="col-lg-4">
                                    <select name="category_id" class="form-control">
                                        <optgroup label="sdfgdf">
                                            <option></option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="col-lg-4"></div>
                            </form>

                            <table class="table table-bordered table-framed">
                                <thead>
                                <tr>
                                    <th>{{ trans('client.history.test_code') }}</th>
                                    <th>{{ trans('client.history.name_test') }}</th>
                                    <th>{{ trans('client.history.duration') }}</th>
                                    <th>{{ trans('client.history.score') }}</th>
                                    <th>{{ trans('client.history.created_at') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section pb-0"></div>
@endsection
