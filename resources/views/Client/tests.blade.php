@extends('Client.master')

@section('title', trans('client.tests.academics_tests'))

@section('content')
    <div class="site-section pb-0"></div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>{{ $category->name }}</span>
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
                            <table class="table table-bordered table-framed">
                                <thead>
                                    <tr>
                                        <th>{{ trans('client.tests.test_code') }}</th>
                                        <th>{{ trans('client.tests.name_test') }}</th>
                                        <th>{{ trans('client.tests.execute_time') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tests as $test)
                                        <tr>
                                            <td>
                                                @if(checkLinkTest(Auth::user(), $test->id, $test->free))
                                                    <a href="{{ route('client.test.guide', ['test_id' => $test->id]) }}"
                                                       data-popup="tooltip" title="{{ $test->name }}">
                                                        {{ $test->code }}
                                                    </a>
                                                @else
                                                    {{ $test->code }}
                                                @endif
                                            </td>
                                            <td>
                                                @if(checkLinkTest(Auth::user(), $test->id, $test->free))
                                                    <a href="{{ route('client.test.guide', ['test_id' => $test->id]) }}"
                                                       data-popup="tooltip" title="{{ $test->name }}">
                                                        {{ $test->name }}
                                                    </a>
                                                @else
                                                    {{ $test->name }}
                                                @endif
                                                @if($test->free)
                                                    <span class="badge badge-success">(free)</span>
                                                @endif
                                            </td>
                                            <td>{{ $test->execute_time }}'</td>
                                        </tr>
                                    @endforeach

                                    @if(!count($tests))
                                        <tr><td colspan="3">{{ trans('client.no_data') }}</td></tr>
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
