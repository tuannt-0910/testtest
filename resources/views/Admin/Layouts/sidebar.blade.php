<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="{{ route('admin.users.profile') }}" class="media-left">
                        <img src="
                            @if(Auth::user()->image_id)
                                {{ asset(Auth::user()->file->base_folder . '/' . Auth::user()->file->name) }}
                            @else
                                {{ asset(config('constant.icon.link_country_placeholder')) }}
                            @endif
                            " class="img-circle img-sm">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->username }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;{{ Auth::user()->role->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="navigation-header"><span>{{ trans('sidebar.Main') }}</span> <i class="icon-menu"></i></li>
                    <li class="{{ request()->is('admin') ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}"><i class="icon-home4"></i> <span>{{ trans('sidebar.Dashboard') }}</span></a>
                    </li>
                    @can('view-users')
                        <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <a href="#"><i class="icon-stack2"></i> <span>{{ trans('page.users.list.users') }}</span></a>
                            <ul>
                                <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                                    <a href="{{ route('admin.users.index') }}">{{ trans('page.list_users') }}</a>
                                </li>
                                @can('add-user')
                                    <li class="{{ request()->is('admin/users/edit') ? 'active' : '' }}">
                                        <a href="{{ route('admin.users.edit') }}">{{ trans('page.add_user') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('view-categories')
                        <li class="{{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}"><i class="icon-copy"></i> <span>{{ trans('page.category.list_categories') }}</span></a>
                        </li>
                    @endcan
                    @can('view-tests')
                        <li class="{{ request()->is('admin/tests') || request()->is('admin/tests/*') ? 'active' : '' }}">
                            <a href="{{ route('tests.index') }}"><i class="icon-droplet2"></i> <span>{{ trans('page.test.list_tests') }}</span></a>
                            <ul>
                                <li class="{{ request()->is('admin/tests') ? 'active' : '' }}">
                                    <a href="{{ route('tests.index') }}">{{ trans('page.list_tests') }}</a>
                                </li>
                                @can('add-test')
                                    <li class="{{ request()->is('admin/tests/create') ? 'active' : '' }}">
                                        <a href="{{ route('tests.create') }}">{{ trans('page.add_test') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('view-questions')
                        <li class="{{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                            <a href="#"><i class="icon-droplet2"></i> <span>{{ trans('page.question.questions') }}</span></a>
                            <ul>
                                <li class="{{ request()->is('admin/questions') ? 'active' : '' }}">
                                    <a href="{{ route('questions.index') }}">{{ trans('page.question.list_questions') }}</a>
                                </li>
                                @can('add-question')
                                    <li class="{{ request()->is('admin/questions/create') ? 'active' : '' }}">
                                        <a href="{{ route('questions.create') }}">{{ trans('page.question.add_question') }}</a>
                                    </li>
                                @endcan
                                @can('import-questions')
                                    <li class="{{ request()->is('admin/questions/import') ? 'active' : '' }}">
                                        <a href="{{ route('admin.questions.getImport') }}">{{ trans('page.question.add_question_by_file') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('view-list-commands')
                        <li class="{{ request()->is('admin/comments') ? 'active' : '' }}">
                            <a href="{{ route('comments.index') }}"><i class="icon-droplet2"></i> <span>{{ trans('page.comment.comments') }}</span></a>
                        </li>
                    @endcan
                    @can('view-list-backups')
                        <li class="{{ request()->is('admin/backups') ? 'active' : '' }}">
                            <a href="{{ route('admin.backup.getList') }}"><i class="icon-droplet2"></i> <span>{{ trans('page.backup.list_backup') }}</span></a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</div>
