@extends('Admin.master')

@section('title', trans('page.category.list_categories'))

@section('progress_bar')
    <li><a href="#"><i class="icon-home2 position-left"></i> {{ trans('page.home') }}</a></li>
    <li class="active">{{ trans('page.category.categories') }}</li>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
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

                                            <li id="add_item" data-jstree='{"icon":"icon-add"}' data-href="sdfsd"></li>
                                        </ul>
                                    </li>
                                @endforeach

                                <li class="add_item" data-jstree='{"icon":"icon-add"}' data-href="{{ route('categories.create', ['parent_id' => $category->id]) }}"></li>
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
                <h5 class="panel-title">{{ $category->name }}</h5>

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
                            <th>{{ trans('page.category.actions') }}</th>
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
                                            <li><a href="{{ route('admin.users.edit') }}" data-popup="tooltip" title="{{ trans('page.edit') }}"><i class="icon-pencil7"></i></a></li>
                                            <li><a href="#" data-popup="tooltip" title="{{ trans('page.remove') }}"><i class="icon-trash"></i></a></li>
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