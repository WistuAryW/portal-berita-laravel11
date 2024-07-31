<div class="col-lg-4">
    <div class="section-tittle mb-3">
        <h3>Paling Banyak Komentar</h3>
    </div>

    @foreach ($mostCommentedPosts as $post)
        <div class=" row trand-right-single  my-0 ">
            <div class="col-4 trand-right-img mx-0 px-0">
                @if ($post->thumbnail)
                    <img width="100%" src="{{ asset($post->thumbnail) }}" class="img-thumbnail">
                @else
                    <span class="text-muted">No Thumbnail</span>
                @endif
            </div>
            <div class="col-8 trand-right-cap pl-2 pr-0">
                <span class="color1">{{ $post->categorie->name }}</span>
                <h4 style="font-size: 15px" class="my-0"><a
                        href="{{ url('category-post-' . $post->id) }}">{{ Str::limit($post->title, 60) }}</a>
                </h4>
            </div>
        </div>
    @endforeach

</div>
