<div class="trending-area fix">
    <div class="container">
        <div class="trending-main ">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Pilihan Editor</strong>
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
            <div class="row ">
                <div class="col-lg-8">
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($pilihanPosts as $post)
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
                                            <h4><a href="{{ url('details') }}">{{ Str::limit($post->title, 40) }}</a></h4>
                                            <p>{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($editorChoices as $post)
                            <div class="col-lg-6 my-0">
                                <div class="row trand-right-single d-flex  my-0">
                                    <div class=" col-4 trand-right-img mx-0 px-0">
                                        @if ($post->thumbnail)
                                            <img width="100%" src="{{ asset($post->thumbnail) }}"
                                                class="img-thumbnail">
                                        @else
                                            <span class="text-muted">No Thumbnail</span>
                                        @endif
                                    </div>
                                    <div class="col-8 trand-right-cap pl-2 pr-0">
                                        <span class="color1">{{ $post->categorie->name }}</span>
                                        <h4 style="font-size: 15px"><a href="{{  url('category-post-'. $post->id) }}">{{ Str::limit($post->title, 50) }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Riht content -->
                @include('home.components.comment')
                {{--  --}}
            </div>
        </div>
    </div>
</div>
