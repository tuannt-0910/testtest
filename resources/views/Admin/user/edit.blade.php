@extends('Admin.master')

@section('title', trans('page.edit_user'))

@section('progress_bar')
    <li><a href="{{route('admin.home')}}"><i class="icon-home2 position-left"></i> {{trans('page.home')}}</a></li>
    <li><a href="{{route('admin.users.index')}}">{{trans('page.users.list.users')}}</a></li>
    <li class="active">{{trans('page.edit_user')}}</li>
@endsection

@section('content')

@endsection