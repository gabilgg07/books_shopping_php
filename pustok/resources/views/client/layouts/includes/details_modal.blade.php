<div class="modal-content">
    <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="product-details-modal">
        <div class="row">
            <div class="col-lg-5">
                <!-- Product Details Slider Big Image-->
                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".product-slider-nav"
                            }'>

                    <div class="single-slide">
                        <img src="{{asset($book->mainImage()->image)}}" alt="">
                    </div>
                    @if (count($book->images()))
                    @foreach ($book->images() as $img)
                    <div class="single-slide">
                        <img src="{{asset($img->image)}}" alt="">
                    </div>
                    @endforeach
                    @endif
                </div>
                <!-- Product Details Slider Nav -->
                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                    <div class="single-slide">
                        <img src="{{asset($book->mainImage()->image)}}" alt="">
                    </div>
                    @if (count($book->images()))
                    @foreach ($book->images() as $img)
                    <div class="single-slide">
                        <img src="{{asset($img->image)}}" alt="">
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-7 mt--30 mt-lg--30">
                <div class="product-details-info pl-lg--30 ">
                    <h3 class="product-title">
                        {{$book->title}}
                    </h3>
                    <ul class="list-unstyled">
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
                        <span class="price-new">£{{number_format($book->price-($book->price*$book->campaign->discount_percent/100), 2, '.', '')}}</span>
                        <del class="price-old">£{{number_format($book->price, 2, '.', '')}}</del>
                        @else
                        <span class="price-new">£{{number_format($book->price, 2, '.', '')}}</span>
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
                        <div class="count-input-block">
                            <span class="widget-label">Qty</span>
                            <input type="number" class="form-control text-center" value="1">
                        </div>
                        <div class="add-cart-btn">
                            <a href="" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add
                                to Cart</a>
                        </div>
                    </div>
                    <div class="compare-wishlist-row">
                        <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                        <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>