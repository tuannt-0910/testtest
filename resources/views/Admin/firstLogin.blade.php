<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('page.firstLoginAdmin.first_login_Academics') }}</title>

    <link href="{{asset(mix('css/admin.css'))}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/treejs/style.css') }}">

    <script src="{{ asset('Admin/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/treejs/jstree.min.js') }}"></script>
    <script type="text/javascript" src="{{asset(mix('js/admin.js'))}}"></script>
</head>

<body class="login-container bg-slate-800">
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <form action="{{ route('admin.postFirstLogin') }}" method="POST">
                    @csrf

                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-warning-400 text-warning-400"><i class="icon-checkmark"></i></div>
                            <h5 class="content-group-lg">{{ trans('page.firstLoginAdmin.change_pass_first') }}</h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left @if(isset($errors) && $errors->has('old_password')){{ 'has-error has-feedback' }}@endif">
                            <input type="password" name="old_password" class="form-control"
                                   placeholder="{{ trans('page.firstLoginAdmin.old_password') }}">
                            @if(isset($errors) && $errors->has('old_password'))<span class="help-block">{{ $errors->first('old_password') }}</span>@endif
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left @if(isset($errors) && $errors->has('new_password')){{ 'has-error has-feedback' }}@endif">
                            <input type="password" name="new_password" class="form-control"
                                   placeholder="{{ trans('page.firstLoginAdmin.new_password') }}">
                            @if(isset($errors) && $errors->has('new_password'))<span class="help-block">{{ $errors->first('new_password') }}</span>@endif
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left @if(isset($errors) && $errors->has('confirm_password')){{ 'has-error has-feedback' }}@endif">
                            <input type="password" name="confirm_password" class="form-control"
                                   placeholder="{{ trans('page.firstLoginAdmin.confirm_password') }}">
                            @if(isset($errors) && $errors->has('confirm_password'))<span class="help-block">{{ $errors->first('confirm_password') }}</span>@endif
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">{{ trans('page.firstLoginAdmin.change_password') }}
                                <i class="icon-circle-right2 position-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
