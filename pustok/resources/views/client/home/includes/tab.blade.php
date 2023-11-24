<div class="home-right-side">
    <div class="single-block">
        <div class="sb-custom-tab text-lg-left text-center">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
                        aria-controls="shop" aria-selected="true">
                        Featured Products
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men"
                        aria-selected="true">
                        New Arrivals
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab" aria-controls="woman"
                        aria-selected="false">
                        Most view products
                    </a>
                    <span class="arrow-icon"></span>
                </li>
            </ul>
            <div class="tab-content space-db--30" id="myTabContent">
                <div class="tab-pane active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                        data-slick-setting='{
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
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        jpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Rpple iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-1.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Bpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Koss Lightweight
                                            Headphone</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-2.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-3.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Cpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Beats Wired
                                            On-Ear
                                            Headphone-Black</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-3.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-2.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Dpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Beats Solo2 Solo
                                            2
                                            Wired On-Ear</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-4.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-5.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Lpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Beats Solo3
                                            Wireless
                                            Headphones 2</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-5.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-4.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Fpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Ways To Have
                                            Appealing BOOK</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-6.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-7.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Epple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">10 Minutes, I'll
                                            Give You Truth About</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-7.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-6.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Fpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Ways To Get
                                            Through
                                            BOOK</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-8.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-9.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Gpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">What Can You Do
                                            To
                                            Save Your BOOK</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-9.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-8.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Hpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">From Destruction
                                            By
                                            Social Media?</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-10.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-11.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Gpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Find Out More
                                            About
                                            BOOK ?</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-11.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-10.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Vpple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">Read This
                                            Contro versial BOOK?</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-12.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-11.jpg')}}"
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
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                        data-slick-setting='{
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
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-10.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-9.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-9.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-10.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-8.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-9.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-7.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-8.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-6.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-7.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-5.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-6.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-11.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-8.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-12.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-4.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-9.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-8.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-6.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-5.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-3.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-4.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-8.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-5.jpg')}}"
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
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                        data-slick-setting='{
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
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-1.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-2.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-3.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-3.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-2.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-4.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-5.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-5.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-4.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-6.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-7.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-7.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-6.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-8.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-9.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-9.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-8.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-10.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-11.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-11.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-10.jpg')}}"
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
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Apple
                                    </a>
                                    <h3><a href="{{route('client.shop.details')}}/1">iPad with
                                            Retina Display</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('client/assets/image/products/product-12.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                                <img src="{{asset('client/assets/image/products/product-11.jpg')}}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>