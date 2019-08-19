@extends('Client.master')

@section('title', trans('client.login.academics_login'))

@section('content')
    <div class="site-section pb-0"></div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form action="{{ route('client.postLogin') }}" method="POST">
                        @csrf

                        @if(isset($errors) && $errors->has('password'))
                            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">{{ trans('client.login.login_false') }}</span>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="username">{{ trans('client.login.email') }}</label>
                                <input name="email" type="email" id="email" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password">{{ trans('client.login.password') }}</label>
                                <input name="password" type="password" id="password" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="{{ trans('client.login.login') }}" class="btn btn-primary btn-lg px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section pb-0"></div>
@endsection

@cannot('view-admin')
    @section('script')
        <script src="{{ asset('Client/js/tawk.to.js') }}"></script>
    @endsection
@endcannot
