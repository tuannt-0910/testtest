@extends('Client.master')

@section('content')
    @include('Client.layouts.slide')

    <div class="site-section pb-0">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>{{ trans('client.home.categories') }}</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                        <div class="feature-1 border">
                            <div class="icon-wrapper bg-primary">
                                <span class="flaticon-mortarboard text-white"></span>
                            </div>
                            <div class="feature-1-content">
                                <h2>{{ $category->name }}</h2>
                                <p>{{ trans('client.home.try_test') }}</p>
                                <p><a href="#"
                                      class="btn btn-primary px-4 rounded-0">{{ trans('client.home.learn_more') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="site-section pb-0">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <h2 class="section-title-underline mb-3">
                        <span>{{ trans('client.home.free_test') }}</span>
                    </h2>
                    <p>{{ trans('client.home.below_free_test') }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="owl-slide-3 owl-carousel">
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <div class="price">$99.00</div>
                                <div class="category"><h3>Mobile Application</h3></div>
                            </figure>
                            <div class="course-1-content pb-4">
                                <h2>How To Create Mobile Apps Using Ionic</h2>
                                <p><a href="#" class="btn btn-primary rounded-0 px-4">{{ trans('client.home.enroll_test') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-bg style-1 background-image-hero1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section-title-underline style-2">
                        <span>{{ trans('client.home.about_our_website') }}</span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <p class="lead">{{ trans('client.home.right_about_our_website') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="news-updates">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="section-heading">
                        <h2 class="text-black">{{ trans('client.home.new_update') }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="post-entry-big horizontal d-flex mb-4">
                                <div class="post-content">
                                    <div class="post-meta">June 6, 2019 / Admission, Updates</div>
                                    <h3 class="post-heading"><a href="#">Campus Camping and Learning Session</a></h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section ftco-subscribe-1 background-image-bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2>{{ trans('client.home.subscribe_to_us') }}</h2>
                    <p>{{ trans('client.home.below_subscribe') }}</p>
                </div>
                <div class="col-lg-5">
                    <form action="" class="d-flex">
                        <input type="text" class="rounded form-control mr-2 py-3" placeholder="{{ trans('client.home.enter_mail') }}">
                        <button class="btn btn-primary rounded py-3 px-4" type="submit">{{ trans('client.home.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
