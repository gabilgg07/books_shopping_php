@php
$models = $component_model['models'];
@endphp

<!--=================================
  Brands Slider
===================================== -->
<section class="section-margin">
    <!-- <h2 class="sr-only">Brand Slider</h2> -->
    <div class="container">
        <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 5,
                                            "loop": true
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
            @foreach ($models as $model)
            <div class="single-slide">
                <img src="{{asset($model->image)}}" alt="brands">
            </div>
            @endforeach
            <!-- <div class="single-slide">
                <img src="{{asset('client/assets/image/others/brand-2.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('client/assets/image/others/brand-3.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('client/assets/image/others/brand-4.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('client/assets/image/others/brand-5.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('client/assets/image/others/brand-6.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('client/assets/image/others/brand-1.jpg')}}" alt="">
            </div>
            <div class="single-slide">
                <img src="{{asset('client/assets/image/others/brand-2.jpg')}}" alt="">
            </div> -->
        </div>
    </div>
</section>