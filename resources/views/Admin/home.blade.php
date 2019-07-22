@extends('Admin.master')

@section('title', 'Home - Academics')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <span class="heading-text badge bg-teal-800">+53,6%</span>
                            </div>

                            <h3 class="no-margin">3,450</h3>
                            Members online
                            <div class="text-muted text-size-small">489 avg</div>
                        </div>

                        <div class="container-fluid">
                            <div id="members-online"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel bg-pink-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                            <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                            <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                            <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="no-margin">49.4%</h3>
                            Current server load
                            <div class="text-muted text-size-small">34.6% avg</div>
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

                            <h3 class="no-margin">$18,390</h3>
                            Today's revenue
                            <div class="text-muted text-size-small">$37,578 avg</div>
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">My messages</h6>
                    <div class="heading-elements">
                        <span class="heading-text"><i class="icon-history text-warning position-left"></i> Jul 7, 10:30</span>
                        <span class="label bg-success heading-text">Online</span>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="content-group">
                                <h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 2,345</h6>
                                <span class="text-muted text-size-small">this week</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 3,568</h6>
                                <span class="text-muted text-size-small">this month</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 32,693</h6>
                                <span class="text-muted text-size-small">all messages</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="messages-stats"></div>

                <ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
                    <li class="active">
                        <a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
                            Tuesday
                        </a>
                    </li>

                    <li>
                        <a href="#messages-mon" class="text-size-small text-uppercase" data-toggle="tab">
                            Monday
                        </a>
                    </li>

                    <li>
                        <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
                            Friday
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active fade in has-padding" id="messages-tue">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-xs" alt="">
                                    <span class="badge bg-danger-400 media-badge">8</span>
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        James Alexander
                                        <span class="media-annotation pull-right">14:58</span>
                                    </a>

                                    <span class="display-block text-muted">The constitutionally inventoried precariously...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-xs" alt="">
                                    <span class="badge bg-danger-400 media-badge">6</span>
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Margo Baker
                                        <span class="media-annotation pull-right">12:16</span>
                                    </a>

                                    <span class="display-block text-muted">Pinched a well more moral chose goodness...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-xs" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Jeremy Victorino
                                        <span class="media-annotation pull-right">09:48</span>
                                    </a>

                                    <span class="display-block text-muted">Pert thickly mischievous clung frowned well...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-xs" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Beatrix Diaz
                                        <span class="media-annotation pull-right">05:54</span>
                                    </a>

                                    <span class="display-block text-muted">Nightingale taped hello bucolic fussily cardinal...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-xs" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Richard Vango
                                        <span class="media-annotation pull-right">01:43</span>
                                    </a>

                                    <span class="display-block text-muted">Amidst roadrunner distantly pompously where...</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-pane fade has-padding" id="messages-mon">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Isak Temes
                                        <span class="media-annotation pull-right">Tue, 19:58</span>
                                    </a>

                                    <span class="display-block text-muted">Reasonable palpably rankly expressly grimy...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Vittorio Cosgrove
                                        <span class="media-annotation pull-right">Tue, 16:35</span>
                                    </a>

                                    <span class="display-block text-muted">Arguably therefore more unexplainable fumed...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Hilary Talaugon
                                        <span class="media-annotation pull-right">Tue, 12:16</span>
                                    </a>

                                    <span class="display-block text-muted">Nicely unlike porpoise a kookaburra past more...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Bobbie Seber
                                        <span class="media-annotation pull-right">Tue, 09:20</span>
                                    </a>

                                    <span class="display-block text-muted">Before visual vigilantly fortuitous tortoise...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Walther Laws
                                        <span class="media-annotation pull-right">Tue, 03:29</span>
                                    </a>

                                    <span class="display-block text-muted">Far affecting more leered unerringly dishonest...</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-pane fade has-padding" id="messages-fri">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Owen Stretch
                                        <span class="media-annotation pull-right">Mon, 18:12</span>
                                    </a>

                                    <span class="display-block text-muted">Tardy rattlesnake seal raptly earthworm...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Jenilee Mcnair
                                        <span class="media-annotation pull-right">Mon, 14:03</span>
                                    </a>

                                    <span class="display-block text-muted">Since hello dear pushed amid darn trite...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Alaster Jain
                                        <span class="media-annotation pull-right">Mon, 13:59</span>
                                    </a>

                                    <span class="display-block text-muted">Dachshund cardinal dear next jeepers well...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Sigfrid Thisted
                                        <span class="media-annotation pull-right">Mon, 09:26</span>
                                    </a>

                                    <span class="display-block text-muted">Lighted wolf yikes less lemur crud grunted...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="{{asset('Admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt="">
                                </div>

                                <div class="media-body">
                                    <a href="#">
                                        Sherilyn Mckee
                                        <span class="media-annotation pull-right">Mon, 06:38</span>
                                    </a>

                                    <span class="display-block text-muted">Less unicorn a however careless husky...</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection