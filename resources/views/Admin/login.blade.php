<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('page.loginAdmin.login_Academics') }}</title>

    <link href="{{ asset(mix('css/admin.css')) }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/treejs/style.css') }}">

    <script src="{{ asset('Admin/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/treejs/jstree.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset(mix('js/admin.js')) }}"></script>
</head>

<body class="login-container bg-slate-800">
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content">
                    <form action="{{ route('admin.postLogin') }}" method="POST">
                        @csrf

                        @if(isset($errors) && ($errors->has('email') || $errors->has('password')))
                            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">{{ trans('page.loginAdmin.login_failure') }}</span>
                            </div>
                        @endif

                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
                                <h5 class="content-group-lg">{{ trans('page.loginAdmin.login_to_account') }}</h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left @if(isset($errors) && ($errors->has('email') || $errors->has('password'))){{ 'has-error has-feedback' }}@endif">
                                <input type="email" name="email" class="form-control"
                                       value="@if(Session::has('login')){{ Session::get('email') }}@endif"
                                       placeholder="{{ trans('page.loginAdmin.email') }}">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left @if(isset($errors) && ($errors->has('email') || $errors->has('password'))){{ 'has-error has-feedback' }}@endif">
                                <input type="password" name="password" class="form-control"
                                       placeholder="{{ trans('page.loginAdmin.password') }}">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6 text-right">
                                        <a href="#">{{ trans('page.loginAdmin.forgot_password') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn bg-blue btn-block">{{ trans('page.loginAdmin.login') }}
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
