<div class="home-right-side">
    <div class="single-block">
        <div class="sb-custom-tab text-lg-left text-center">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="true">
                        {{__('featured.products')}}
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men" aria-selected="true">
                        {{__('new.arrivals')}}
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab" aria-controls="woman" aria-selected="false">
                        {{__('most.view')}}
                    </a>
                    <span class="arrow-icon"></span>
                </li>
            </ul>
            <div class="tab-content space-db--30" id="myTabContent">
                <div class="tab-pane active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 3,
                        "rows":2,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>
                        @foreach ($featureds as $book)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        {{$book->author}}
                                    </a>
                                    <h3><a href="{{ route('client.shop.details', $book->id) }}">{{Str::limit($book->title,18)}}</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ asset($book->mainImage()->image) }}" alt="{{$book->slug}} 1">
                                        <div class="hover-contents">
                                            <a href="{{ route('client.shop.details', $book->id) }}" class="hover-image">
                                                @php
                                                $imgHover = $book->images()->first() !== null ?
                                                $book->images()->first()->image :
                                                $book->mainImage()->image;
                                                @endphp
                                                <img src="{{ asset($imgHover) }}" alt="{{$book->slug}} 2">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="{{route('client.cart.add', $book->id)}}" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>

                                                <a href="#" data-toggle="modal" data-target="#quickModal" data-url="{{route('client.shop.getDetails', $book->id)}}" class="single-btn detail_modal">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
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
                <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                    }' data-slick-responsive='[
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                        @foreach ($new_arrivals as $book)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        {{$book->author}}
                                    </a>
                                    <h3><a href="{{ route('client.shop.details', $book->id) }}">{{Str::limit($book->title,18)}}</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ asset($book->mainImage()->image) }}" alt="{{$book->slug}} 1">
                                        <div class="hover-contents">
                                            <a href="{{ route('client.shop.details', $book->id) }}" class="hover-image">
                                                @php
                                                $imgHover = $book->images()->first() !== null ?
                                                $book->images()->first()->image :
                                                $book->mainImage()->image;
                                                @endphp
                                                <img src="{{ asset($imgHover) }}" alt="{{$book->slug}} 2">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="{{route('client.cart.add', $book->id)}}" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>

                                                <a href="#" data-toggle="modal" data-target="#quickModal" data-url="{{route('client.shop.getDetails', $book->id)}}" class="single-btn detail_modal">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
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
                <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>

                        @foreach ($most_view_books as $book)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        {{$book->author}}
                                    </a>
                                    <h3><a href="{{ route('client.shop.details', $book->id) }}">{{Str::limit($book->title,18)}}</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ asset($book->mainImage()->image) }}" alt="{{$book->slug}} 1">
                                        <div class="hover-contents">
                                            <a href="{{ route('client.shop.details', $book->id) }}" class="hover-image">
                                                @php
                                                $imgHover = $book->images()->first() !== null ?
                                                $book->images()->first()->image :
                                                $book->mainImage()->image;
                                                @endphp
                                                <img src="{{ asset($imgHover) }}" alt="{{$book->slug}} 2">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="{{route('client.cart.add', $book->id)}}" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>

                                                <a href="#" data-toggle="modal" data-target="#quickModal" data-url="{{route('client.shop.getDetails', $book->id)}}" class="single-btn detail_modal">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
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
                        <!-- <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details',1)}}">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-1.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details',1)}}" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-1.jpg')}}"
                                                    alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>