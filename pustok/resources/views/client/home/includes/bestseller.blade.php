<div class="home-left-side text-center text-lg-left">
    <div class="single-block">
        <h3 class="home-sidebar-title">
            {{__('best.sellers')}}
        </h3>
        <div class="product-slider product-list-slider multiple-row sb-slick-slider home-4-left-sidebar" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":1,
                                            "rows":4,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2, "rows":2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2, "rows":2} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>

            @foreach ($best_seller as $book)
            <div class="single-slide">
                <div class="product-card card-style-list">
                    <div class="card-image">
                        <img src="{{ asset($book->mainImage()->image) }}" alt="{{$book->slug}} 1">
                    </div>
                    <div class="product-card--body">
                        <div class="product-header">
                            <a href="#" class="author">
                                {{$book->author}}
                            </a>
                            <h3><a href="{{ route('client.shop.details', $book->id) }}">{{Str::limit($book->title,22)}}</a>
                            </h3>
                        </div>
                        <div class="price-block">
                            @if ($book->campaign)
                            <span class="price">{{__('symbol.currency')}}{{number_format($currPrice * ($book->price-($book->price*$book->campaign->discount_percent/100)), 2, '.', '')}}</span>
                            <del class="price-old">{{__('symbol.currency')}}{{number_format($currPrice * $book->price, 2, '.', '')}}</del>
                            <span class="price-discount">{{$book->campaign->discount_percent}}%</span>
                            @else
                            <span class="price">{{__('symbol.currency')}}{{number_format($currPrice * $book->price, 2, '.', '')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



</div>