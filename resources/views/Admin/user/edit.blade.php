@extends('Admin.master')

@section('title')
    @if($user)
        {{ trans('page.edit_user') }}
    @else
        {{ trans('page.add_user') }}
    @endif
@endsection

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('admin.users.index') }}">{{ trans('page.users.list.users') }}</a></li>
    <li class="active">
        @if($user)
            {{ trans('page.edit_user') }}
        @else
            {{ trans('page.add_user') }}
        @endif
    </li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <fieldset class="content-group">
                    <legend class="text-bold">@if($user){{ trans('page.edit_user') }} - {{ $user->username }}@else{{ trans('page.add_user') }}@endif</legend>

                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        @if($user && $user->file && $user->file->name)
                            <div class="col-lg-6">
                                <div class="thumb thumb-rounded">
                                    <img src="{{ asset($user->file->base_folder . '/' . $user->file->name) }}" alt="{{ $user->file->name }}">
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-4">
                            <input name="avatar" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-sm" data-remove-class="btn btn-default btn-sm" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('username')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.users.list.table_property.username') }}</label>
                        <div class="col-lg-10">
                            <input name="username" type="text" class="form-control" value="@if($user){{ $user->username }}@elseif(Session::has('user')){{ Session::get('user')['username'] }}@endif">
                            @if(isset($errors) && $errors->has('username'))<span class="help-block">{{ $errors->first('username') }}</span>@endif
                        </div>
                    </div>


                    <div class="form-group @if(isset($errors) && $errors->has('firstname')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.users.list.table_property.firstname') }}</label>
                        <div class="col-lg-10">
                            <input name="firstname" type="text" class="form-control" value="@if($user){{ $user->firstname }}@elseif(Session::has('user')){{ Session::get('user')['firstname'] }}@endif">
                            @if(isset($errors) && $errors->has('firstname'))<span class="help-block">{{ $errors->first('firstname') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('lastname')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.users.list.table_property.lastname') }}</label>
                        <div class="col-lg-10">
                            <input name="lastname" type="text" class="form-control" value="@if($user){{ $user->lastname }}@elseif(Session::has('user')){{ Session::get('user')['lastname'] }}@endif">
                            @if(isset($errors) && $errors->has('lastname'))<span class="help-block">{{ $errors->first('lastname') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('address')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.users.list.table_property.address') }}</label>
                        <div class="col-lg-10">
                            <input name="address" type="text" class="form-control" value="@if($user){{ $user->address }}@elseif(Session::has('user')){{ Session::get('user')['address'] }}@endif">
                            @if(isset($errors) && $errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('phone')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.users.list.table_property.phone') }}</label>
                        <div class="col-lg-10">
                            <input name="phone" type="text" class="form-control" value="@if($user){{ $user->phone }}@elseif(Session::has('user')){{ Session::get('user')['phone'] }}@endif">
                            @if(isset($errors) && $errors->has('phone'))<span class="help-block">{{ $errors->first('phone') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('email')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.users.list.table_property.email') }}</label>
                        <div class="col-lg-10">
                            <input name="email" type="email" class="form-control" value="@if($user){{ $user->email }}@elseif(Session::has('user')){{ Session::get('user')['email'] }}@endif">
                            @if(isset($errors) && $errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
                        </div>
                    </div>

                    @if(!$user)
                        <div class="form-group @if(isset($errors) && $errors->has('password')){{ 'has-error has-feedback' }}@endif">
                            <label class="control-label col-lg-2"><b>{{ trans('page.users.list.table_property.password') }}</b></label>
                            <div class="col-lg-10">
                                <input name="password" type="text" class="form-control" placeholder="{{ trans('page.users.list.table_property.password_default') }}">
                                @if(isset($errors) && $errors->has('password'))<span class="help-block">{{ $errors->first('password') }}</span>@endif
                            </div>
                        </div>
                    @endif

                    <div class="form-group @if(isset($errors) && $errors->has('birthday')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.users.list.table_property.birthday') }}</label>
                        <div class="col-lg-10">
                            <input name="birthday" type="date" class="form-control" value="@if($user){{ $user->birthday }}@elseif(Session::has('user')){{ Session::get('user')['birthday'] }}@endif">
                            @if(isset($errors) && $errors->has('birthday'))<span class="help-block">{{ $errors->first('birthday') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('role')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.role') }}</label>
                        <div class="col-lg-10">
                            <select name="role" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($user && $user->role_id == $role->id){{ "selected" }}@endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if(isset($errors) && $errors->has('role'))<span class="help-block">{{ $errors->first('role') }}</span>@endif
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ trans('page.submit') }} <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
