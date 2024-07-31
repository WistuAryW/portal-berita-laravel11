<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Ekonomi</strong>
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
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($ekonomiPosts as $post)
                                <div class="col-lg-6">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-2">
                                            @if ($post->thumbnail)
                                                <img width="100%" src="{{ asset($post->thumbnail) }}"
                                                    class="img-thumbnail">
                                            @else
                                                <span class="text-muted">No Thumbnail</span>
                                            @endif
                                        </div>
                                        <div class="trend-bottom-cap my-0">
                                            <h4><a href="{{  url('category-post-'. $post->id)}}">{{ $post->title }}</a></h4>
                                            <p>{{ $post->created_at->diffForHumans() }}</p>
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
