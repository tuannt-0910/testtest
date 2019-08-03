@extends('Admin.master')

@section('title', trans('page.comment.list_comments'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.comment.list_comments') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <fieldset class="content-group">
                <legend class="text-bold">{{ trans('page.comment.list_comments') }}</legend>

                <div class="form-group">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('success') }}</span>
                        </div>
                    @endif
                </div>
                <input id="route_getDatas" type="hidden" value="{{ route('admin.comments.getComments') }}">
            </fieldset>

            <table class="table table-bordered" id="list_comments_table">
                <thead>
                <tr>
                    <th>{{ trans('page.comment.question_code') }}</th>
                    <th>{{ trans('page.comment.author') }}</th>
                    <th>{{ trans('page.comment.question_content') }}</th>
                    <th>{{ trans('page.comment.content') }}</th>
                    <th>{{ trans('page.comment.created_at') }}</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('Admin/assets/js/comment.js') }}"></script>
@endsection
