<div class="weekly2-news-area gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Weekly Top News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">
                        @foreach ($trendingPosts as $post)
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    @if ($post->thumbnail)
                                        <img width="100%" src="{{ asset($post->thumbnail) }}" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Thumbnail</span>
                                    @endif
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">{{ $post->categorie->name }}</span>
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                    <h4><a href="{{  url('category-post-'. $post->id) }}">{{ Str::limit($post->title, 40) }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
