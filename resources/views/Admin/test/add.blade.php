@extends('Admin.master')

@section('title')
    @if(isset($test))
        {{ trans('page.test.edit_tests') }}
    @else
        {{ trans('page.test.add_tests') }}
    @endif
@endsection

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('tests.index') }}">{{ trans('page.test.list_tests') }}</a></li>
    <li class="active">
        @if(isset($test))
            {{ trans('page.test.edit_tests') }}
        @else
            {{ trans('page.test.add_tests') }}
        @endif
    </li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" method="POST"
                  action="@if(isset($test)){{ route('tests.update', ['test' => $test->id]) }}@else{{ route('tests.store') }}@endif"
            >
                @csrf
                @if(isset($test))@method('PUT')@endif

                <fieldset class="content-group">
                    <legend class="text-bold">
                        @if(isset($test))
                            {{ trans('page.test.edit_tests') }} -
                        @else
                            {{ trans('page.test.add_tests') }}
                        @endif
                    </legend>

                    <div class="form-group">
                        <label class="control-label col-lg-2">{{ trans('page.test.category_parent') }}</label>
                        <div class="col-lg-10">
                            <select name="category_id" class="form-control">
                                @foreach($allCates as $parentCate)
                                    <optgroup label="{{ $parentCate->name }}">
                                        @foreach($parentCate->childCategories as $childCate)
                                            <option value="{{ $childCate->id }}" @if(isset($category) && $category->id == $childCate->id){{ 'selected' }}@endif>
                                                {{ $childCate->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('name')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.test.name_test') }}</label>
                        <div class="col-lg-10">
                            <input name="name" type="text" class="form-control"
                                   value="@if(isset($test)){{ $test->name }}@elseif(Session::has('test')){{ Session::get('test')['name'] }}@endif">
                            @if(isset($errors) && $errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('test_code')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.test.test_code') }}</label>
                        <div class="col-lg-10">
                            <input name="test_code" type="text" class="form-control"
                                   value="@if(isset($test)){{ $test->code }}@elseif(Session::has('test')){{ Session::get('test')['test_code'] }}@endif">
                            @if(isset($errors) && $errors->has('test_code'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('execute_time')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.test.execute_time') }}</label>
                        <div class="col-lg-10">
                            <input name="execute_time" type="number" class="form-control"
                                   value="@if(isset($test)){{ $test->execute_time }}@elseif(Session::has('test')){{ Session::get('test')['execute_time'] }}@endif">
                            @if(isset($errors) && $errors->has('execute_time'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('total_question')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.test.total_question') }}</label>
                        <div class="col-lg-10">
                            <input name="total_question" type="number" class="form-control"
                                   value="@if(isset($test)){{ $test->total_question }}@elseif(Session::has('test')){{ Session::get('test')['total_question'] }}@endif">
                            @if(isset($errors) && $errors->has('total_question'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group @if(isset($errors) && $errors->has('content_guide')){{ 'has-error has-feedback' }}@endif">
                        <label class="control-label col-lg-2">{{ trans('page.test.content_guide') }}</label>
                        <div class="col-lg-10">
                            <textarea
                                name="content_guide"
                                rows="5" cols="5"
                                class="form-control"
                                placeholder="{{ trans('page.test.default_guide') }}"
                            >@if(isset($test)){{ $test->content_guide }}@elseif(Session::has('test')){{ Session::get('test')['content_guide'] }}@endif</textarea>
                            @if(isset($errors) && $errors->has('content_guide'))<span class="help-block">{{ $errors->first('content_guide') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">{{ trans('page.test.free') }}</label>
                        <div class="col-lg-10">
                            <div class="checkbox checkbox-switchery">
                                <label>
                                    <input name="free" type="checkbox"
                                           class="switchery" @if(isset($test) && $test->free == 1){{ 'checked' }}@endif>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">{{ trans('page.test.publish') }}</label>
                        <div class="col-lg-10">
                            <div class="checkbox checkbox-switchery">
                                <label>
                                    <input name="publish" type="checkbox"
                                           class="switchery" @if(isset($test) && $test->publish == 1){{ 'checked' }}@endif>
                                </label>
                            </div>
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

@section('script')
    <script type="text/javascript" src="{{ asset('Admin/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Admin/assets/js/pages/form_checkboxes_radios.js') }}"></script>
@endsection
