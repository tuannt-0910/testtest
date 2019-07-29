@extends('Admin.master')

@section('title', trans('page.list_users'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.users.list.users') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">

            <form class="form-horizontal">
                <fieldset class="content-group">
                    <legend class="text-bold">{{ trans('page.users.list.list_user') }}</legend>

                </fieldset>
            </form>
        </div>
    </div>
@endsection
