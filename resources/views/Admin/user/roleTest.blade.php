@extends('Admin.master')

@section('title', trans('page.test_role'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li><a href="{{ route('admin.users.index') }}">{{ trans('page.users.list.users') }}</a></li>
    <li class="active">{{ trans('page.test_role') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">
            <fieldset class="content-group">
                <legend class="text-bold">{{ trans('page.test_role') }}</legend>
                <div class="content-group-sm">
                    <h5 class="text-semibold no-margin">
                        <img src="
                            @if($user->image_id)
                                {{ asset($user->file->base_folder . '/' . $user->file->name) }}
                            @else
                                {{ asset(config('constant.icon.link_country_placeholder')) }}
                            @endif
                                " class="img-circle img-responsive image_profile"
                        >
                        ({{ $user->username }}) {{ $user->lastname }} {{ $user->firstname }}
                    </h5>

                    <span class="display-block"><label class="{{ $user->role->color }}">{{ $user->role->name }}</label></span>
                </div>

                <p class="content-group">{{ trans('page.users.guide_choose_role_test') }}</p>
                @csrf

                <div class="tree-checkbox-hierarchical well border-left-sucess border-left-lg"
                     data-urlSetRole="{{ route('admin.users.postRoleTest', ['user_id' => $user->id]) }}">
                    <ul>
                        @foreach($categories as $category)
                            <li class="folder expanded">{{ $category->name }}
                                <ul>
                                    @foreach($category->childCategories as $childCategory)
                                        <li class="folder">{{ $childCategory->name }}
                                            <ul>
                                                @foreach($childCategory->tests as $test)
                                                    <li data-test_id="{{ $test->id }}"
                                                        class="@if(count($test->listUserViewTest)){{'selected'}}@endif"
                                                    >{{ $test->name }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </fieldset>
        </div>
    </div>
@endsection
