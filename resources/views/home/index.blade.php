@extends('layouts.main')

@section('title', 'Home')

@section('content')

<main>
    <!-- Trending Area Start -->
    @include('home.components.trending')
    <!-- Trending Area End -->

    <!-- Weekly-News Start -->
    @include('home.components.hot-news')
    <!-- End Weekly-News -->

    <!-- Whats New Start -->
    @include('home.components.pilihan')
    <!-- Whats New End -->

    <!-- Whats New Start -->
    @include('home.components.politik')
    <!-- Whats New End -->

    <!-- Weekly-News Start -->
    @include('home.components.hukum')
    <!-- End Weekly-News -->

    <!-- Weekly2-News Start -->
    @include('home.components.weekle2-news')
    <!-- End Weekly2-News -->

    <!-- Weekly-News Start -->
    @include('home.components.ekonomi')
    <!-- End Weekly-News -->

    <!-- Weekly-News Start -->
    @include('home.components.metro')
    <!-- End Weekly-News -->

    <!-- Weekly-News Start -->
    @include('home.components.humani')
    <!-- End Weekly-News -->

    <!-- Start Youtube -->
    {{-- @include('home.components.youtube') --}}
    <!-- End Start Youtube -->

    <!-- Recent Articles Start -->
    @include('home.components.olaraga')
    <!-- Recent Articles End -->

    <!-- Start Pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pagination -->
</main>

@endsection
