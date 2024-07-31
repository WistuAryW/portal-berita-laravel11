<div class="col-lg-4">
    <div class="section-tittle mb-3">
        <h3>Terpopular</h3>
    </div>

    @foreach ($posts as $post)
        <div class="trand-right-single d-flex">
            <div class="trand-right-img">
                <img src="assets/img/trending/right1.jpg" alt="">
            </div>
            <div class="trand-right-cap">
                <span class="color1">{{ $post->categorie->name }}</span>
                <h4><a href="{{  url('category-post-'. $post->id) }}">{{ Str::limit($post->title, 37) }}</a></h4>
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
            <h4><a href="{{ url('details') }}"><strong>Pengamatan hilal Idul Adha di berbagai daerah</strong></a></h4>
        </div>
    </div>

    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="assets/img/trending/right2.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color3">sea beach</span>
            <h4><a href="{{ url('details') }}">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div>
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="assets/img/trending/right3.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color2">Bike Show</span>
            <h4><a href="{{ url('details') }}">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div>
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="assets/img/trending/right4.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color4">See beach</span>
            <h4><a href="{{ url('details') }}">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div>
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="assets/img/trending/right5.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color1">Skeping</span>
            <h4><a href="{{ url('details') }}">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div>

</div>
