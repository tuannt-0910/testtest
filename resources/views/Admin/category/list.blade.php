@extends('Admin.master')

@section('title', trans('page.category.list_categories'))

@section('progress_bar')
    <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.category.categories') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            @if(Session::has('success'))
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">{{ Session::get('success') }}</span>
                </div>
            @endif

            <h5 class="panel-title">{{ trans('page.category.list_categories') }}</h5>

            <div id="html1" class="mt-10">
                <ul>
                    @foreach($categories as $category)
                        <li data-jstree='{"icon":"icon-home2 position-left"}'>{{ $category->name }} ({{ count($category->childCategories) }})
                            <ul>
                                @foreach($category->childCategories as $childCategory)
                                    <li data-jstree='{"icon":"icon-key"}'>{{ $childCategory->name }} ({{ count($childCategory->tests) }})
                                        <ul>
                                            @foreach($childCategory->tests as $test)
                                                <li data-jstree='{"icon":"icon-clipboard"}'>{{ $test->name }}</li>
                                            @endforeach

                                            @can('add-test')
                                                <li class="add_item" data-jstree='{"icon":"icon-add"}'
                                                    data-href="{{ route('tests.create', ['category_id' => $childCategory->id]) }}"
                                                ></li>
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach

                                @can('add-category')
                                    <li class="add_item" data-jstree='{"icon":"icon-add"}'
                                        data-href="{{ route('categories.create', ['parent_id' => $category->id]) }}"
                                    ></li>
                                @endcan
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @foreach($categories as $category)
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">{{ $category->name }}
                    @can('edit-category')
                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-link" data-popup="tooltip" title="{{ trans('page.edit') }}"><i class="icon-pencil7"></i></a>
                    @endcan
                </h5>

                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-framed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('page.category.name') }}</th>
                            <th>{{ trans('page.category.content_guide') }}</th>
                            <th>{{ trans('page.category.number_of_tests') }}</th>
                            <th>{{ trans('page.last_edit') }}</th>
                            @if(Auth::user()->can('edit-category') || Auth::user()->can('remove-category'))
                                <th>{{ trans('page.category.actions') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($category->childCategories) > 0)
                            @foreach($category->childCategories as $key=>$childCategory)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $childCategory->name }}</td>
                                    <td>{{ $childCategory->content_guide }}</td>
                                    <td>{{ count($childCategory->tests) }}</td>
                                    <td>{{ $childCategory->updated_at }}</td>
                                    <td>
                                        <ul class="icons-list">
                                            @can('edit-category')
                                                <li><a href="{{ route('categories.edit', ['category' => $childCategory->id]) }}" data-popup="tooltip" title="{{ trans('page.edit') }}"><i class="icon-pencil7"></i></a></li>
                                            @endcan
                                            @can('remove-category')
                                                <li>
                                                    <form method="POST" action="{{ route('categories.destroy', ['category' => $childCategory->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-link" data-popup="tooltip" title="{{ trans('page.remove') }}"><i class="icon-trash"></i></button>
                                                    </form>
                                                </li>
                                            @endcan
                                        </ul>
                                    </td>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center h2">{{ trans('page.no_data') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    <script>
        $(function(){
            $('#html1').jstree();
            $(document).on('click', '.add_item', function () {
                var href = this.dataset.href;
                window.open(href, "_self");
            });
        });
    </script>
@endsection
