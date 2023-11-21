@extends("client.layouts.master")

@section("content")
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="shop-toolbar mb--30">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <!-- Product View Mode -->
                    <div class="product-view-mode">
                        <a href="#" class="sorting-btn active" data-target="grid-four">
                            <span class="grid-four-icon">
                                <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                    <span class="toolbar-status">
                        Showing 1 to 9 of 14 (2 Pages)
                    </span>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>Sort By:</span>
                        <select class="form-control nice-select sort-select mr-0">
                            <option value="" selected="selected">Default Sorting</option>
                            <option value="">Sort
                                By:Name (A - Z)</option>
                            <option value="">Sort
                                By:Name (Z - A)</option>
                            <option value="">Sort
                                By:Price (Low &gt; High)</option>
                            <option value="">Sort
                                By:Price (High &gt; Low)</option>
                            <option value="">Sort
                                By:Rating (Highest)</option>
                            <option value="">Sort
                                By:Rating (Lowest)</option>
                            <option value="">Sort
                                By:Model (A - Z)</option>
                            <option value="">Sort
                                By:Model (Z - A)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="shop-product-wrap grid-four with-pagination row space-db--30 shop-border">
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Epple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">Here Is A Quick Cure For Book</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-2.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-1.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-3.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    Gpple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Qpple cPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Lpple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">Simple Things You To Save BOOK</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-4.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-5.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-6.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    fpple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Apple iPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Cpple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">3 Ways Create Better BOOK With</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-7.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-8.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-7.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    Apple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Apple iPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Rpple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">Simple Things You To Save BOOK</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-8.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-7.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-8.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    Apple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Apple iPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Gpple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">How Deal With Very Bad BOOK</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-9.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-10.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-9.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    Apple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Apple iPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Rtpple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">The Hidden Mystery Behind</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-10.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-9.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-10.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    Apple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Apple iPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Upple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">Little Known Ways To Rid Yourself</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-11.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-12.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-11.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    Apple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Apple iPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Bpple
                            </a>
                            <h3><a href="{{route('client.shop.details')}}/1">Qple GPad with Retina Sisplay</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset('client/assets/image/products/product-2.jpg')}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.details')}}/1" class="hover-image">
                                        <img src="{{asset('client/assets/image/products/product-1.jpg')}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{asset('client/assets/image/products/product-2.jpg')}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="" class="author">
                                    Apple
                                </a>
                                <h3><a href="{{route('client.shop.details')}}/1" tabindex="0">Apple iPad with Retina
                                        Display
                                        MD510LL/A</a></h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of
                                    battery life, the new iPod classic
                                    lets you enjoy
                                    up to 40,000 songs or..</p>
                            </article>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a href="" class="btn btn-outlined">Add To Cart</a>
                                <a href="" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                <a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination Block -->
        @include("client.layouts.partials.pagination")
        <!-- Modal -->
        @include("client.layouts.partials.details_modal")
    </div>
</main>

@endsection