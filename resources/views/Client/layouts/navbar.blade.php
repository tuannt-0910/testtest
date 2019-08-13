<nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
        <li class="active">
            <a href="{{ route('home') }}" class="nav-link text-left">{{ trans('client.header.home') }}</a>
        </li>
        @foreach($categories as $category)
            <li class="has-children">
                <a href="{{ route('client.categories', ['category_id' => $category->id]) }}"
                   class="nav-link text-left">{{ $category->name }}</a>
                <ul class="dropdown">
                    @foreach($category->childCategories as $childCategory)
                        <li>
                            <a href="{{ route('client.tests', ['category_id' => $childCategory->id]) }}">{{ $childCategory->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
        @if(Auth::check())
            <li>
                <a href="{{ route('client.histories') }}" class="nav-link text-left">{{ trans('client.header.histories') }}</a>
            </li>
        @endif
        <li>
            <a href="{{ route('client.ranking') }}" class="nav-link text-left">{{ trans('client.header.ranking') }}</a>
        </li>
        <li>
            <a href="#" class="nav-link text-left">{{ trans('client.header.blog') }}</a>
        </li>
    </ul>
</nav>
