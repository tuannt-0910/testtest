@extends('Admin.master')

@section('title', trans('page.list_users'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.test.list_tests') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <fieldset class="content-group">
                <legend class="text-bold">{{ trans('page.test.list_tests') }}</legend>

                <div class="form-group">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('success') }}</span>
                        </div>
                    @endif
                </div>
                <input id="route_getDatas" type="hidden" value="{{ route('admin.test.getTests') }}">
            </fieldset>

            <table class="table table-bordered" id="list_test_table">
                <thead>
                    <tr>
                        <th>{{ trans('page.test.name_test') }}</th>
                        <th>{{ trans('page.test.test_code') }}</th>
                        <th>{{ trans('page.test.category_parent') }}</th>
                        <th>{{ trans('page.test.created_user') }}</th>
                        <th>{{ trans('page.test.execute_time') }}</th>
                        <th>{{ trans('page.test.total_question') }}</th>
                        <th>{{ trans('page.test.free') }}</th>
                        <th>{{ trans('page.test.publish') }}</th>
                        <th>{{ trans('page.test.created_at') }}</th>
                        <th>{{ trans('page.test.actions') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('Admin/assets/js/list_test.js') }}"></script>
@endsection
