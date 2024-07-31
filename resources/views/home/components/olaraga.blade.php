<div class="recent-articles">
    <div class="container">
        <div class="recent-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Olaraga</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="recent-active dot-style d-flex dot-style">
                        @foreach ($olaragaPosts as $post)
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                    @if ($post->thumbnail)
                                        <img width="100%" src="{{ asset($post->thumbnail) }}" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Thumbnail</span>
                                    @endif
                                </div>
                                <div class="what-cap">
                                    <span class="color1">{{ $post->categorie->name }}</span>
                                    <h4><a href="{{  url('category-post-'. $post->id) }}">{{ Str::limit($post->title, 57) }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
