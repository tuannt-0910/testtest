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
                                    <select name="test_id" class="form-control">
                                        <option></option>
                                        @foreach($childCategories as $category)
                                            <optgroup label="{{ $category->name }}">
                                                @foreach($category->tests as $test)
                                                    <option value="{{ $test->id }}" @if($test_id == $test->id){{ 'selected' }}@endif>
                                                        ({{ $test->code }}) {{ $test->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <input class="btn btn-primary" type="submit">
                                </div>
                            </form>

                            <table class="table table-bordered table-framed">
                                <thead>
                                    <tr>
                                        <th>{{ trans('client.ranking.#') }}</th>
                                        <th>{{ trans('client.ranking.user_name') }}</th>
                                        <th>{{ trans('client.ranking.email') }}</th>
                                        <th>{{ trans('client.ranking.test_code') }}</th>
                                        <th>{{ trans('client.ranking.name_test') }}</th>
                                        <th>{{ trans('client.ranking.score') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rankings as $key => $ranking)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $ranking->user->username }}</td>
                                            <td>{{ $ranking->user->email }}</td>
                                            <td>{{ $ranking->test->code }}</td>
                                            <td>{{ $ranking->test->name }}</td>
                                            <td>
                                                <div class="{{ config('constant.ranking.' . $key .'_ranking') }}">{{ $ranking->score }}</div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if(!count($rankings))
                                        <tr>
                                            <td colspan="6">{{ trans('client.no_data') }}</td>
                                        </tr>
                                    @endif
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

@cannot('view-admin')
    @section('script')
        <script src="{{ asset('Client/js/tawk.to.js') }}"></script>
    @endsection
@endcannot
