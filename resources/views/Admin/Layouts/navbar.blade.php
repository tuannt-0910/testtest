<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.home') }}"><img src="{{ asset(config('constant.icon.link_logo')) }}"></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <p class="navbar-text"><span class="label bg-success">{{ trans('navbar.Online') }}</span></p>

        <p class="navbar-text">
            <a class="text-success" href="{{ route('home') }}"><i class="icon-backward"></i> {{ trans('navbar.view_client') }}</a>
        </p>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset(config('constant.icon.link_country_gb')) }}" class="position-left">
                    {{ trans('navbar.English') }}
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="deutsch"><img src="{{ asset(config('constant.icon.link_country_de')) }}"> {{ trans('navbar.Deutsch') }}</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">{{ trans('navbar.Messages') }}</span>
                    <span class="badge bg-warning-400">2</span>
                </a>

                <div class="dropdown-menu dropdown-content width-350">
                    <div class="dropdown-content-heading">
                        {{ trans('navbar.Messages') }}
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-compose"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body">
                        <li class="media">
                            <div class="media-left">
                                <img src="{{ asset(config('constant.icon.link_country_placeholder')) }}" class="img-circle img-sm">
                                <span class="badge bg-danger-400 media-badge">5</span>
                            </div>

                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold"></span>
                                    <span class="media-annotation pull-right"></span>
                                </a>

                                <span class="text-muted"></span>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="
                        @if(Auth::user()->image_id)
                            {{ asset(Auth::user()->file->base_folder . '/' . Auth::user()->file->name) }}
                        @else
                            {{ asset(config('constant.icon.link_country_placeholder')) }}
                        @endif
                    ">
                    <span></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('admin.users.profile') }}"><i class="icon-user-plus"></i> {{ trans('navbar.my_profile') }}</a></li>
                    <li><a href="{{ route('admin.users.edit', ['id' => Auth::user()->id]) }}"><i class="icon-cog5"></i> {{ trans('navbar.account_settings') }}</a></li>
                    <li><a href="{{ route('logout') }}"><i class="icon-switch2"></i> {{ trans('navbar.logout') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
