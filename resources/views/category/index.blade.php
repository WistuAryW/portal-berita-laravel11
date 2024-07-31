@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>{{ $name }}</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="assets/img/trending/trending_top.jpg" alt="">
                                <div class="trend-top-cap">
                                    <span>Appetizers</span>
                                    <h2><a href="{{ url('details') }}">Welcome To The Best Model Winner<br> Contest At Look
                                            of
                                            the year</a></h2>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row ">
                                @foreach ($posts as $post)
                                    <div class="col-md-12 my-0">
                                        <div class="row trand-right-single d-flex my-0">
                                            <div class="col-md-5 trend-bottom-img">
                                                @if ($post->thumbnail)
                                                    <img width="100%" src="{{ asset($post->thumbnail) }}"
                                                        class="img-thumbnail">
                                                @else
                                                    <span class="text-muted">No Thumbnail</span>
                                                @endif
                                            </div>
                                            <div class="col-md-7 trand-right-cap">
                                                <p class="my-0 text-danger"><strong>{{ $post->categorie->name }}</strong>
                                                </p>
                                                <h4 class="my-0"><a
                                                        href="{{ url('category-post-' . $post->id) }}">{{ $post->title }}</a>
                                                </h4>
                                                <p class="my-0"><small>{{ $post->created_at->diffForHumans() }}</small>
                                                </p>
                                                <p>{!! Str::limit(strip_tags($post->content), 200) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <div class="section-tittle mb-3">
                            <h3>Terpopular</h3>
                        </div>
                        @foreach ($trendingPosts as $post)
                            <div class=" row trand-right-single  my-0 ">
                                <div class="col-4 trand-right-img mx-0 px-0">
                                    @if ($post->thumbnail)
                                        <img width="100%" src="{{ asset($post->thumbnail) }}" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Thumbnail</span>
                                    @endif
                                </div>
                                <div class="col-8 trand-right-cap pl-2 pr-0">
                                    <h4 style="font-size: 15px" class="my-0"><a
                                            href="{{ url('category-post-' . $post->id) }}">{{ Str::limit($post->title, 70) }}</a>
                                    </h4>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                        <div class="section-tittle mb-3">
                            <h3>Top News</h3>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <img width="100%" src="assets/img/trending/right2.jpg" alt="">
                            </div>
                        </div>
                        <div class="row trand-right-single">
                            <div class="col trand-right-cap">
                                <span class="color1 mt-2 mb-0">Skeping</span>
                                <h4><a href="{{ url('details') }}"><strong>Pengamatan hilal Idul Adha di berbagai
                                            daerah</strong></a></h4>
                            </div>
                        </div>
                        @foreach ($postsall as $post)
                            <div class=" row trand-right-single  my-0 ">
                                <div class="col-4 trand-right-img mx-0 px-0">
                                    @if ($post->thumbnail)
                                        <img width="100%" src="{{ asset($post->thumbnail) }}" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Thumbnail</span>
                                    @endif
                                </div>
                                <div class="col-8 trand-right-cap pl-2 pr-0">
                                    <h4 style="font-size: 15px" class="my-0"><a
                                            href="{{ url('category-post-' . $post->id) }}">{{ Str::limit($post->title, 70) }}</a>
                                    </h4>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>

    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->

@endsection
