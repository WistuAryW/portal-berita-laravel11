<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Trending now</strong>
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
                        <div class="row">
                            @foreach ($trendingPostsb as $post)
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            @if ($post->thumbnail)
                                                <img width="100%" src="{{ asset($post->thumbnail) }}"
                                                    class="img-thumbnail">
                                            @else
                                                <span class="text-muted">No Thumbnail</span>
                                            @endif
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">{{ $post->categorie->name }}</span>
                                            <h4><a href="{{  url('category-post-'. $post->id) }}">{{ Str::limit($post->title, 40) }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Riht content -->
                @include('home.components.right-content')
                {{--  --}}
            </div>
        </div>
    </div>
</div>
