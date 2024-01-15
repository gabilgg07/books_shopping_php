<section class="hero-area hero-slider-4 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="sb-slick-slider" data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow": 1,
                                                                    "dots":true
                                                                    }'>
                    @foreach ($hero_sliders as $key=>$slide)
                    <div class="single-slide bg-image bg-overlay--{{$key%2==0?'white':'dark'}}"
                        data-bg="{{asset($slide->image)}}">
                        {!!$slide->text_content!!}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>