@extends('Admin.master')

@section('title', trans('page.category.add_category'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('categories.index') }}">{{ trans('page.category.categories') }}</a></li>
    <li class="active">{{ trans('page.category.add_category') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('categories.store', ['parent_id' => $parentCategory->id]) }}">
                {{ csrf_field() }}

                <fieldset class="content-group">
                    <legend class="text-bold">{{ trans('page.category.add_category') }}</legend>

                    <div class="form-group">
                        <label class="control-label col-lg-2">{{ trans('page.category.category_parent') }}</label>
                        <div class="col-lg-10">
                            <span class="label label-primary">{{ $parentCategory->name }}</span>
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.category.cate_name') }}</label>
                        <div class="col-lg-10">
                            <input name="name" type="text" class="form-control" value="@if(Session::has('category')){{ Session::get('category')['name'] }}@endif">
                            @if(isset($errors) && $errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
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