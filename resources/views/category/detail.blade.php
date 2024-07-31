@extends('layouts.main')
@section('title', 'Home')

@section('content')
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>{{ $post->categorie->name }}</strong>
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
                        <div class="about-right mb-90">
                            <div class="about-img">
                                @if ($post->thumbnail)
                                    <img width="100%" src="{{ asset($post->thumbnail) }}" class="img-thumbnail"
                                        alt="{{ $post->title }}">
                                @else
                                    <span class="text-muted">No Thumbnail</span>
                                @endif
                            </div>
                            <div class="section-title mb-30 pt-30">
                                <h3>{{ $post->title }}</h3>
                            </div>
                            <p class="text-muted">
                                Published on
                                {{ \Carbon\Carbon::parse($post->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm') }}
                                WIB
                            </p>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25"> {!! $post->content !!} </p>
                            </div>
                        </div>
                        <div class="comments-area">
                            <h4>{{ $post->comments->count() }} Komentar</h4>
                            @foreach ($post->comments as $comment)
                                <div class="comment-list mb-0">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="assets/img/comment/comment_1.png" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">{{ $comment->message }}</p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>{{ $comment->user->name }}</h5>
                                                        <p class="date">{{ $comment->created_at->format('d M Y H:i') }}
                                                        </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply text-uppercase">reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="social-share">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
                                        target="_blank">Share on Facebook</a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($post->title) }}"
                                        target="_blank">Share on Twitter</a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($url) }}"
                                        target="_blank">Share on LinkedIn</a>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title) }}%20{{ urlencode($url) }}"
                                        target="_blank">Share on WhatsApp</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Tombol Berbagi Media Sosial -->
                                {{-- <div class="social-share">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
                                        target="_blank">Share on Facebook</a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($post->title) }}"
                                        target="_blank">Share on Twitter</a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($url) }}"
                                        target="_blank">Share on LinkedIn</a>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title) }}%20{{ urlencode($url) }}"
                                        target="_blank">Share on WhatsApp</a>
                                </div> --}}
                                {{-- <ul class="social-icons">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                </ul> --}}
                                <div class="section-title mb-3">
                                    <h3>Tambahkan Komentar</h3>
                                </div>
                                <form action="{{ url('comments/store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Pesan"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3 d-flex justify-content-end">
                                        <button type="submit" class="genric-btn danger large px-5">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('home.components.right-content')
                </div>
            </div>
        </div>
    </div>
@endsection
