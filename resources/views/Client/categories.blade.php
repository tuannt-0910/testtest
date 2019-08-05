@extends('Client.master')

@section('title', trans('client.category.academics_categories'))

@section('content')
    <div class="site-section pb-0"></div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>{{ trans('client.category.categories') }} - {{ $category->name }}</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="flaticon-mortarboard text-white"></span>
                        </div>
                        <div class="feature-1-content">
                            <table class="table table-bordered table-framed">
                                <thead>
                                    <tr>
                                        <th>{{ trans('client.category.name_category') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($childCategories as $category)
                                        <tr>
                                            <td>
                                                <a href="{{ route('client.tests', ['category_id' => $category->id]) }}"
                                                   data-popup="tooltip" title="{{ $category->name }}">
                                                    {{ $category->name }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if(!count($childCategories))
                                        <tr><td>{{ trans('client.no_data') }}</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section pb-0"></div>
@endsection
