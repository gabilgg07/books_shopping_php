@extends("client.layouts.master")

@section("content")
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product Details</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-5 mb--30">
                <!-- Product Details Slider Big Image-->
                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                    "infinite":{{count($book->images())?'true':'false'}},
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                    <div class="single-slide">
                        <img src="{{asset($book->mainImage()->image)}}" alt="{{$book->slug}}-1" />
                    </div>
                    @foreach ($book->images() as $key=>$img)
                    <div class="single-slide">
                        <img src="{{asset($img->image)}}" alt="{{$book->slug}}-{{$key+2}}" />
                    </div>
                    @endforeach
                </div>
                <!-- Product Details Slider Nav -->
                @if (count($book->images()))
                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": {{count($book->images())-1<5?count($book->images())-1:4}},
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                    <div class="single-slide">
                        <img src="{{asset($book->mainImage()->image)}}" alt="{{$book->slug}}-1" />
                    </div>
                    @foreach ($book->images() as $key=>$img)
                    <div class="single-slide">
                        <img src="{{asset($img->image)}}" alt="{{$book->slug}}-{{$key+2}}" />
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-lg-7">
                <div class="product-details-info pl-lg--30">
                    <!-- <p class="tag-block">
                        Tags: <a href="#">Movado</a>, <a href="#">Omega</a>
                    </p> -->
                    <h3 class="product-title">
                        {{$book->title}}
                    </h3>
                    <ul class="list-unstyled">
                        <!-- <li>Ex Tax: <span class="list-value"> {{__('symbol.currency')}}60.24</span></li> -->
                        <li>
                            Category:
                            <a href="{{route('client.shop.index', $book->category->slug)}}" class="list-value font-weight-bold"> {{$book->category->title}}</a>
                        </li>
                        @if ($book->campaign)
                        <li>
                            Campaign:
                            <a href="{{route('client.shop.index', ['campaign_id'=>$book->campaign->id])}}" class="list-value font-weight-bold"> {{$book->campaign->title}}</a>
                        </li>
                        @endif
                        <!-- <li>Product Code: <span class="list-value"> model1</span></li> -->
                        <!-- <li>Reward Points: <span class="list-value"> 200</span></li> -->
                        <li>
                            Availability: @if ($book->count)
                            <span class="list-value"> In Stock</span>
                            @else
                            <span class="list-value"> Out Stock</span>
                            @endif
                        </li>
                    </ul>
                    <div class="price-block">
                        @if ($book->campaign)
                        <span class="price-new">{{__('symbol.currency')}}{{number_format($currPrice*($book->price-($book->price*$book->campaign->discount_percent/100)), 2, '.', '')}}</span>
                        <del class="price-old">{{__('symbol.currency')}}{{number_format($currPrice*$book->price, 2, '.', '')}}</del>
                        @else
                        <span class="price-new">{{__('symbol.currency')}}{{number_format($currPrice*$book->price, 2, '.', '')}}</span>
                        @endif
                    </div>
                    <div class="rating-widget">
                        <div class="rating-block">
                            @for ($i = 0; $i< 5; $i++) @if ($i < (int)round($book->reviews->avg('rate')))
                                <span class="fas fa-star star_on"></span>
                                @else
                                <span class="fas fa-star"></span>
                                @endif
                                @endfor
                        </div>
                        <div class="review-widget">
                            <a href="">({{(int)round($book->reviews->avg('rate'))}} Reviews)</a> <span>|</span>
                            <a href="">Write a review</a>
                        </div>
                    </div>
                    <article class="product-details-article">
                        <p>
                            {{$book->short_desc}}
                        </p>
                    </article>
                    <div class="add-to-cart-row">
                        <form action="{{route('client.cart.update.modal')}}" class="row" method="post">
                            @csrf
                            <div class="count-input-block">
                                <span class="widget-label">Qty</span>
                                <input type="number" name="qty" class="form-control text-center" value="1">
                                <input type="hidden" name="book_id" value="{{$book->id}}">
                            </div>
                            <div class="add-cart-btn">
                                <button class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add
                                    to Cart</button>
                            </div>
                        </form>
                    </div>
                    <div class="compare-wishlist-row">
                        <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sb-custom-tab review-tab section-padding">
            <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                        DESCRIPTION
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">
                        REVIEWS ({{$book->reviews->count()}})
                    </a>
                </li>
            </ul>
            <div class="tab-content space-db--20" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                    <article class="review-article">
                        <p>
                            {{$book->long_desc}}
                        </p>
                    </article>
                </div>
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                    <div class="review-wrapper">
                        <h2 class="title-lg mb--20">
                            1 REVIEW FOR AUCTOR GRAVIDA ENIM
                        </h2>
                        @foreach ($book->reviews as $review)
                        <div class="review-comment mb--20">
                            <div class="avatar">
                                <img src="{{asset($review->user->image?$review->user->image:'client/assets/image/user_default_photo.png')}}" alt="" />
                            </div>
                            <div class="text">
                                <div class="rating-block mb--15">
                                    @for ($i = 0; $i< 5; $i++) @if ($i < $review->rate)
                                        <span class="ion-android-star-outline star_on"></span>
                                        @else
                                        <span class="ion-android-star-outline"></span>
                                        @endif
                                        @endfor
                                </div>
                                <h6 class="author">
                                    {{$review->user->first_name}} {{$review->user->last_name}}–
                                    <span class="font-weight-400">{{$review->created_at->format('F d, Y')}}</span>
                                </h6>
                                @if ($review->message)
                                <p>
                                    {{$review->message}}
                                </p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="review-comment mb--20">
                            <div class="avatar">
                                <img src="{{asset('client/assets/image/icon/author-logo.png')}}" alt="" />
                            </div>
                            <div class="text">
                                <div class="rating-block mb--15">
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline"></span>
                                    <span class="ion-android-star-outline"></span>
                                </div>
                                <h6 class="author">
                                    ADMIN –
                                    <span class="font-weight-400">March 23, 2015</span>
                                </h6>
                                <p>
                                    Lorem et placerat vestibulum, metus nisi posuere nisl,
                                    in accumsan elit odio quis mi.
                                </p>
                            </div>
                        </div>
                        <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                        <form action="{{route('client.shop.addReview')}}" method="post">
                            @csrf
                            <div class="rating-row pt-2">
                                <p class="d-block">Your Rating</p>
                                @error('rate')
                                <span class="text-danger">{{$message}}</span>
                                <br />
                                @enderror
                                <input type="hidden" name="rate" class="rate_input">
                                <input type="hidden" name="book_id" value="{{$book->id}}">
                                <span class="rating-widget-block">
                                    <input type="radio" name="star" data-rate="5" id="star1" />
                                    <label for="star1"></label>
                                    <input type="radio" name="star" data-rate="4" id="star2" />
                                    <label for="star2"></label>
                                    <input type="radio" name="star" data-rate="3" id="star3" />
                                    <label for="star3"></label>
                                    <input type="radio" name="star" data-rate="2" id="star4" />
                                    <label for="star4"></label>
                                    <input type="radio" name="star" data-rate="1" id="star5" />
                                    <label for="star5"></label>
                                </span>
                                @error('star')
                                <br />
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="mt--15 site-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="message">Comment</label>
                                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="submit-btn">
                                                <button class="btn btn-black post_btn">Post Comment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="tab-product-details">
  <div class="brand">
    <img src="image/others/review-tab-product-details" alt="">
  </div>
  <h5 class="meta">Reference <span class="small-text">demo_5</span></h5>
  <h5 class="meta">In stock <span class="small-text">297 Items</span></h5>
  <section class="product-features">
    <h3 class="title">Data sheet</h3>
    <dl class="data-sheet">
      <dt class="name">Compositions</dt>
      <dd class="value">Viscose</dd>
      <dt class="name">Styles</dt>
      <dd class="value">Casual</dd>
      <dt class="name">Properties</dt>
      <dd class="value">Maxi Dress</dd>
    </dl>
  </section>
</div> -->
    </div>
    <!--=================================
    RELATED PRODUCTS BOOKS
===================================== -->
    <section class="">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>RELATED PRODUCTS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
                @foreach ($relatedBooks as $item)
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="" class="author"> {{$item->author}} </a>
                            <h3>
                                <a href="{{ route('client.shop.details', $item->id) }}">{{Str::limit($item->title,22)}}</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{ asset($item->mainImage()->image) }}" alt="{{$item->slug}} 1" />
                                <div class="hover-contents">
                                    <a href="{{ route('client.shop.details', $item->id) }}" class="hover-image">
                                        @php
                                        $imgHover = $item->images()->first() !== null ?
                                        $item->images()->first()->image :
                                        $item->mainImage()->image;
                                        @endphp
                                        <img src="{{ asset($imgHover) }}" alt="{{$item->slug}} 2" />
                                    </a>
                                    <div class="hover-btns">
                                        <a href="{{route('client.cart.add', $item->id)}}" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" data-url="{{route('client.shop.getDetails', $item->id)}}" class="single-btn detail_modal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                @if ($item->campaign)

                                <span class="price">{{__('symbol.currency')}}{{number_format($currPrice * ($item->price-($item->price*$item->campaign->discount_percent/100)), 2, '.', '')}}</span>
                                <del class="price-old">{{__('symbol.currency')}}{{number_format($currPrice * $item->price, 2, '.', '')}}</del>
                                <span class="price-discount">{{$item->campaign->discount_percent}}%</span>
                                @else
                                <span class="price">{{__('symbol.currency')}}{{number_format($currPrice * $item->price, 2, '.', '')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
        <div class="modal-dialog" role="document">

        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.detail_modal').on('click', function(e) {
            e.preventDefault();
            const modalUrl = $(this).data('url');
            $('.product-details-slider').slick('unslick');
            $('.product-slider-nav').slick('unslick');

            $.get(modalUrl, function(data, status) {

                if (status !== 'success') {
                    console.error('Error fetching book details:', data.message);
                    return;
                }

                $('#quickModal .modal-dialog').html(data);
                $('.product-details-slider').slick({
                    slidesToShow: 1,
                    arrows: false,
                    fade: true,
                    swipe: true,
                    asNavFor: ".product-slider-nav"
                });

                $('.product-slider-nav').slick({
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 8000,
                    slidesToShow: 4,
                    arrows: true,
                    prevArrow: '<button class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                    nextArrow: '<button class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                    asNavFor: ".product-details-slider",
                    focusOnSelect: true
                });

                $('#quickModal').show();
            });
        });

        $('.rating-widget-block input').on('click', function(e) {
            $('.rate_input').val($(this).data('rate'));
        });
    });
</script>
@endpush