@extends('Admin.master')

@section('title', trans('page.category.add_category'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('categories.index') }}">{{ trans('page.category.categories') }}</a></li>
    <li class="active">{{ trans('page.category.edit_category') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('categories.update', ['category' => $category->id]) }}">
                @method('PUT')
                {{ csrf_field() }}

                <fieldset class="content-group">
                    <legend class="text-bold">{{ trans('page.category.edit_category') }} - {{ $category->name }}</legend>

                    @if(!$category->parent_id)
                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            @if($category && $category->file && $category->file->name)
                                <div class="col-lg-6">
                                    <div class="thumb thumb-rounded">
                                        <img src="{{ asset($category->file->base_folder . '/' . $category->file->name) }}" alt="{{ $category->file->name }}">
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-4">
                                <input name="image_category" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-sm" data-remove-class="btn btn-default btn-sm" accept="image/*">
                            </div>
                        </div>
                    @endif

                    <div class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.category.cate_name') }}</label>
                        <div class="col-lg-10">
                            <input name="name" type="text" class="form-control" value="{{ $category->name }}">
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