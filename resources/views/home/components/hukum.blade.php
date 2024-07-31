<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Hukum</strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($hukumPosts as $post)
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
                                            <h4><a href="{{  url('category-post-'. $post->id) }}">{{ Str::limit($post->title, 75) }}</a></h4>
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
