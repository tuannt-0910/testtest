<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{ asset('Admin/assets/images/placeholder.jpg') }}" class="img-circle img-sm"></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold"></span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="navigation-header"><span>{{ trans('sidebar.Main') }}</span> <i class="icon-menu"></i></li>
                    <li class="active"><a href="{{ route('admin.home') }}"><i class="icon-home4"></i> <span>{{ trans('sidebar.Dashboard') }}</span></a></li>
                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>{{ trans('page.users.list.users') }}</span></a>
                        <ul>
                            <li><a href="{{ route('admin.users.index') }}">{{ trans('page.list_users') }}</a></li>
                            <li><a href="{{ route('admin.users.edit') }}">{{ trans('page.add_user') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}"><i class="icon-copy"></i> <span>{{ trans('page.category.list_categories') }}</span></a>
                    </li>
                    <li>
                        <a href="{{ route('tests.index') }}"><i class="icon-droplet2"></i> <span>{{ trans('page.test.list_tests') }}</span></a>
                        <ul>
                            <li><a href="{{ route('tests.index') }}">{{ trans('page.list_tests') }}</a></li>
                            <li><a href="{{ route('tests.create') }}">{{ trans('page.add_test') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span>{{ trans('page.question.questions') }}</span></a>
                        <ul>
                            <li><a href="{{ route('questions.index') }}">{{ trans('page.question.list_questions') }}</a></li>
                            <li><a href="{{ route('questions.index') }}">{{ trans('page.question.add_question') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span></span></a>
                        <ul>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span></span></a>
                        <ul>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span></span></a>
                        <ul>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span></span></a>
                        <ul>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span></span></a>
                        <ul>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span></span></a>
                        <ul>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span></span></a>
                        <ul>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
