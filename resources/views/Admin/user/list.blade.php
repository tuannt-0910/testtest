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

                    <div class="form-group">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">{{ Session::get('success') }}</span>
                            </div>
                        @endif

                        <label class="control-label col-lg-2">{{ trans('page.search') }}</label>

                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="keyword" value="{{ app('request')->input('keyword') }}">
                        </div>

                        <div class="col-lg-2">
                            <input type="submit" class="btn btn-primary" value="{{ trans('page.search') }}">
                            <a href="{{ route('admin.users.edit') }}" class="btn btn-success">{{ trans('page.add_user') }}</a>
                        </div>
                    </div>

                </fieldset>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-framed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('page.users.list.table_property.image') }}</th>
                            <th>{{ trans('page.users.list.table_property.fullname') }}</th>
                            <th>{{ trans('page.users.list.table_property.username') }}</th>
                            <th>{{ trans('page.users.list.table_property.email') }}</th>
                            <th>{{ trans('page.users.list.table_property.birthday') }}</th>
                            <th>{{ trans('page.users.list.table_property.role') }}</th>
                            <th>{{ trans('page.users.list.table_property.address') }}</th>
                            <th>{{ trans('page.users.list.table_property.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) > 0)
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ ((app('request')->page ?? 1) - 1) * $limit + $key + 1 }}</td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <img src="
                                                @if($user->image_id)
                                                    {{ asset($user->file->base_folder . '/' . $user->file->name) }}
                                                @else
                                                    {{ asset(config('constant.icon.link_country_placeholder')) }}
                                                @endif
                                                " class="img-circle img-md" >
                                        </div>
                                    </td>
                                    <td><a href="{{ route('admin.users.profile', ['id' => $user->id]) }}">{{ $user->lastname . ' ' . $user->firstname }}</a></td>
                                    <td><a href="{{ route('admin.users.profile', ['id' => $user->id]) }}">{{ $user->username }}</a></td>
                                    <td><a href="{{ route('admin.users.profile', ['id' => $user->id]) }}">{{ $user->email }}</a></td>
                                    <td>{{ $user->birthday }}</td>
                                    <td>
                                        <span class="{{ $user->role->color }}">{{ $user->role->name }}</span><hr />
                                        <a href="{{ route('admin.users.role_tests', ['user_id' => $user->id]) }}">{{ trans('page.users.role_test') }}</a>
                                    </td>
                                    <td>{{ $user->address }}</td>
                                    <td>
                                        <ul class="icons-list">
                                            <li><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" data-popup="tooltip" title="{{ trans('page.edit') }}"><i class="icon-pencil7"></i></a></li>
                                            <li><a href="{{ route('admin.users.delete', ['id' => $user->id]) }}" data-popup="tooltip" title="{{ trans('page.remove') }}"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center h2">{{ trans('page.no_data') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="mt-10 text-center">
                    @if(count($users) > 0)
                        {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
