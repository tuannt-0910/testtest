@extends('Client.master')

@section('title', trans('client.history.academics_history'))

@section('content')
    <div class="site-section pb-0"></div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>{{ trans('client.history.history') }}</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="icon-history text-white"></span>
                        </div>
                        <div class="feature-1-content">
                            <form class="row mb-4">
                                <div class="col-lg-3">
                                    <select name="test_id" class="form-control">
                                        <option value="">{{ trans('client.history.test') }}</option>
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

                                <div class="col-lg-1">
                                    <input name="score" type="text" value="{{ $score }}"
                                           class="form-control" placeholder="{{ trans('client.history.score') }}">
                                </div>

                                <div class="col-lg-3">
                                    <input name="from_date" type="date" value="{{ $from_date }}" class="form-control">
                                </div>

                                <div class="col-lg-3">
                                    <input name="to_date" type="date" value="{{ $to_date }}" class="form-control">
                                </div>

                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary mr-2"><i class="icon-search"></i></button>
                                    <a href="{{ route('client.histories') }}" class="btn btn-danger"><i class="icon-remove"></i></a>
                                </div>
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
                                    @foreach($histories as $history)
                                        <tr>
                                            <td><a href="{{ route('client.history', $history->id) }}">{{ $history->test->code }}</a></td>
                                            <td><a href="{{ route('client.history', $history->id) }}">{{ $history->test->name }}</a></td>
                                            <td><a href="{{ route('client.history', $history->id) }}">{{ toMinutes($history->duration) }}</a></td>
                                            <td><a href="{{ route('client.history', $history->id) }}">{{ $history->score }}</a></td>
                                            <td><a href="{{ route('client.history', $history->id) }}">{{ $history->created_at }}</a></td>
                                        </tr>
                                    @endforeach

                                    @if(!count($histories))
                                        <tr>
                                            <td colspan="5">{{ trans('client.no_data') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            {{ $histories->appends(request()->input())->links() }}
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
