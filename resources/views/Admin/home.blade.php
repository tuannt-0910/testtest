@extends('Admin.master')

@section('title', trans('page.home_academics'))

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin"></h3>

                            <div class="text-muted text-size-small"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel bg-pink-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin"></h3>

                            <div class="text-muted text-size-small"></div>
                        </div>

                        <div id="server-load"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel bg-blue-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin"></h3>

                            <div class="text-muted text-size-small"></div>
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"></h6>
                    <div class="heading-elements">
                        <span class="heading-text"><i class="icon-history text-warning position-left"></i> </span>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="content-group">
                                <h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> </h6>
                                <span class="text-muted text-size-small">{{trans('home.this_week')}}</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> </h6>
                                <span class="text-muted text-size-small">{{trans('home.this_month')}}</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> </h6>
                                <span class="text-muted text-size-small">{{trans('home.all')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection