@extends('Admin.master')

@section('title', trans('page.profile'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.profile') }}</li>
@endsection

@section('content')
    <div class="content-group">
        <div class="panel-body bg-blue border-radius-top text-center">
            <a href="#" class="display-inline-block content-group-sm">
                <img src="
                    @if($user->image_id)
                        {{ asset($user->file->base_folder . '/' . $user->file->name) }}
                    @else
                        {{ asset(config('constant.icon.link_country_placeholder')) }}
                    @endif
                    " class="img-circle img-responsive image_profile">
            </a>

            <div class="content-group-sm">
                <h5 class="text-semibold no-margin-bottom">
                    {{ $user->lastname }} {{ $user->firstname }}
                </h5>

                <span class="display-block"><label class="{{ $user->role->color }}">{{ $user->role->name }}</label></span>
            </div>
        </div>

        <div class="panel panel-body no-border-top no-border-radius-top">
            <div class="form-group">
                <label class="text-semibold">{{ trans('page.users.username') }}</label>
                <span class="pull-right-sm">{{ $user->username }}</span>
            </div>

            <div class="form-group">
                <label class="text-semibold">{{ trans('page.users.fullname') }}</label>
                <span class="pull-right-sm">{{ $user->lastname }} {{ $user->firstname }}</span>
            </div>

            <div class="form-group">
                <label class="text-semibold">{{ trans('page.users.birthday') }}</label>
                <span class="pull-right-sm">{{ $user->birthday }}</span>
            </div>

            <div class="form-group">
                <label class="text-semibold">{{ trans('page.users.email') }}</label>
                <span class="pull-right-sm">{{ $user->email }}</span>
            </div>

            <div class="form-group">
                <label class="text-semibold">{{ trans('page.users.phone') }}</label>
                <span class="pull-right-sm">{{ $user->phone }}</span>
            </div>

            <div class="form-group">
                <label class="text-semibold">{{ trans('page.users.role') }}</label>
                <span class="pull-right-sm"><label class="{{ $user->role->color }}">{{ $user->role->name }}</label></span>
            </div>
        </div>
    </div>
@endsection
