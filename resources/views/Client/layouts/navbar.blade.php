<nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
        <li class="active">
            <a href="{{ route('client.home') }}" class="nav-link text-left">{{ trans('client.header.home') }}</a>
        </li>
        @foreach($categories as $category)
            <li class="has-children">
                <a href="#" class="nav-link text-left">{{ $category->name }}</a>
                <ul class="dropdown">
                    @foreach($category->childCategories as $childCategory)
                        <li><a href="#">{{ $childCategory->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
        <li>
            <a href="#" class="nav-link text-left">{{ trans('client.header.histories') }}</a>
        </li>
        <li>
            <a href="#" class="nav-link text-left">{{ trans('client.header.ranking') }}</a>
        </li>
        <li>
            <a href="#" class="nav-link text-left">{{ trans('client.header.blog') }}</a>
        </li>
    </ul>
</nav>
