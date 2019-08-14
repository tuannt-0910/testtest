@extends('Admin.master')

@section('title', trans('page.backup.list_backup'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.backup.list_backup') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">

            <form class="form-horizontal">
                <fieldset class="content-group">
                    <legend class="text-bold">{{ trans('page.backup.list_backup') }}</legend>

                    <div class="form-group">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">{{ Session::get('success') }}</span>
                            </div>
                        @endif
                    </div>

                </fieldset>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-framed">
                    <thead>
                        <tr>
                            <th>{{ trans('page.backup.index') }}</th>
                            <th>{{ trans('page.backup.file') }}</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($files as $key => $file)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ basename($file) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
