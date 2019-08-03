@extends('Admin.master')

@section('title', trans('page.home_academics'))

@section('progress_bar')
    <li class="active">{{ trans('page.home') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">{{ $countUsers }}</h3>
                            <div class="text-muted text-size-small">{{ trans('page.dashboard.users_number') }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="panel bg-pink-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">{{ $countTests }}</h3>
                            <div class="text-muted text-size-small">{{ trans('page.dashboard.tests_number') }}</div>
                        </div>
                        <div id="server-load"></div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="panel bg-blue-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">{{ $countTestHistories }}</h3>
                            <div class="text-muted text-size-small">{{ trans('page.dashboard.tested_number') }}</div>
                        </div>
                        <div id="today-revenue"></div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="panel bg-blue-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">{{ $countComments }}</h3>
                            <div class="text-muted text-size-small">{{ trans('page.dashboard.commands_number') }}</div>
                        </div>
                        <div id="today-revenue"></div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="col-lg-8">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title text-semibold">{{ trans('page.dashboard.title_chart_statical') }}</h6>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="chart-container">
                            <div class="chart" id="c3-area-chart"
                                 data-column_x="{{ json_encode(trans('page.dashboard.column_x')) }}"
                                 data-label_x="{{ trans('page.dashboard.label_x') }}"
                                 data-label_y="{{ trans('page.dashboard.label_y') }}"
                                 data-color_tests="{{ config('constant.column_chart.color_tests') }}"
                                 data-color_tested="{{ config('constant.column_chart.color_tested') }}"
                                 data-height="{{ config('constant.column_chart.height') }}"
                                 data-tick_rotate="{{ config('constant.column_chart.tick_rotate') }}"
                                 data-testes="{{ $historyChart['tests'] }}"
                                 data-tested="{{ $historyChart['tested'] }}"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">{{ trans('page.dashboard.tested_statical') }}</h6>
                        <div class="heading-elements">
                            <span class="heading-text"><i class="icon-history text-warning position-left"></i> </span>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="content-group">
                                    <h6 class="text-semibold no-margin">
                                        <i class="icon-clipboard3 position-left text-slate"></i> {{ $staticalTesteds['this_week'] ?? 0 }}
                                    </h6>
                                    <span class="text-muted text-size-small">{{ trans('page.dashboard.this_week') }}</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="content-group">
                                    <h6 class="text-semibold no-margin">
                                        <i class="icon-calendar3 position-left text-slate"></i> {{ $staticalTesteds['this_month'] ?? 0 }}
                                    </h6>
                                    <span class="text-muted text-size-small">{{ trans('page.dashboard.this_month') }}</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="content-group">
                                    <h6 class="text-semibold no-margin">
                                        <i class="icon-calendar3 position-left text-slate"></i> {{ $staticalTesteds['this_year'] ?? 0 }}
                                    </h6>
                                    <span class="text-muted text-size-small">{{ trans('page.dashboard.this_year') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
