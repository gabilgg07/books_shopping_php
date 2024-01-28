@extends("client.layouts.master")

@section("content")

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Cart Page Start -->
<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <form action="{{route('client.cart.update')}}" method="post">
        @csrf
        <input type="hidden" class="currency_value" value="{{$currPrice}}">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    @if (session('msgType'))
                    <p class="text-primary">{{session('msgType')}}</p>
                    @endif
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    @foreach (Cart::content() as $cart)
                                    @php
                                    $titles = (array)json_decode($cart->name);
                                    if($titles && count($titles)){
                                    $title = $titles[LaravelLocalization::getCurrentLocale()];
                                    }
                                    @endphp
                                    <tr>
                                        </td>
                                        <td class="pro-thumbnail"><a
                                                href="{{ route('client.shop.details', $cart->id) }}"><img
                                                    src="{{asset($cart->options['image'])}}" alt="{{$cart->name}}"></a>
                                        </td>
                                        <td class="pro-title"><a
                                                href="{{ route('client.shop.details', $cart->id) }}">{{$title ?? $cart->name}}</a>
                                        </td>
                                        <td class="pro-price">
                                            <span>{{__('symbol.currency')}}{{number_format($currPrice * $cart->price, 2, '.', '')}}</span>
                                        </td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" name="qty[{{$cart->rowId}}]"
                                                        data-price="{{$cart->price}}" data-id="{{$cart->id}}"
                                                        class="form-control text-center qty_cart"
                                                        value="{{$cart->qty}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal">
                                            <span class="subtotal_price"
                                                data-id="{{$cart->id}}">{{__('symbol.currency')}}{{number_format($currPrice * $cart->price * $cart->qty, 2, '.', '')}}</span>
                                        </td>
                                        <td class="pro-remove"><a href="{{route('client.cart.remove',$cart->rowId)}}"><i
                                                    class="far fa-trash-alt"></i></a>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                        <!-- slide Block 5 / Normal Slider -->
                        <div class="cart-block-title">
                            <h2>YOU MAY BE INTERESTED IN…</h2>
                        </div>
                        <div class="product-slider sb-slick-slider" data-slick-setting='{
							          "autoplay": true,
							          "autoplaySpeed": 8000,
							          "slidesToShow": 2
									  }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                            @foreach ($books as $book)
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <span class="author">
                                            {{$book->author}}
                                        </span>
                                        <h3><a
                                                href="{{route('client.shop.details',$book->id)}}">{{Str::limit($book->title,22)}}</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ asset($book->mainImage()->image) }}" alt="">
                                            <div class="hover-contents">
                                                <a href="{{ route('client.shop.details', $book->id) }}"
                                                    class="hover-image">
                                                    @php
                                                    $imgHover = $book->images()->first() !== null ?
                                                    $book->images()->first()->image :
                                                    $book->mainImage()->image;
                                                    @endphp
                                                    <img src="{{asset($imgHover)}}" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('client.cart.add', $book->id)}}"
                                                        class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        data-url="{{route('client.shop.getDetails', $book->id)}}"
                                                        class="single-btn detail_modal">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            @if ($book->campaign)

                                            <span
                                                class="price">{{__('symbol.currency')}}{{number_format($currPrice * ($book->price-($book->price*$book->campaign->discount_percent/100)), 2, '.', '')}}</span>
                                            <del
                                                class="price-old">{{__('symbol.currency')}}{{number_format($currPrice * $book->price, 2, '.', '')}}</del>
                                            <span class="price-discount">{{$book->campaign->discount_percent}}%</span>
                                            @else
                                            <span
                                                class="price">{{__('symbol.currency')}}{{number_format($currPrice * $book->price, 2, '.', '')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Cart Summary -->
                    <div class="col-lg-6 col-12 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4><span>Cart Summary</span></h4>
                                <!-- <p>Sub Total <span class="text-primary">$1250.00</span></p> -->
                                <!-- <p>Shipping Cost <span class="text-primary">$00.00</span></p> -->
                                <h2>Grand Total <span
                                        class="text-primary grand_total">{{__('symbol.currency')}}{{number_format($currPrice * Cart::subtotal(), 2, '.', '')}}</span>
                                </h2>
                            </div>
                            <div class="cart-summary-button">
                                <a href="{{route('client.account.checkout')}}"
                                    class="checkout-btn c-btn btn--primary">Checkout</a>
                                <button class="update-btn c-btn btn-outlined">Update Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<!-- Cart Page End -->

<!-- Modal -->
<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.detail_modal').on('click', function(e) {
        // e.preventDefault();
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

    // const subTotal = "{{$currPrice * Cart::subtotal()}}";
    const currencyVal = $('.currency_value').val();
    const symbolCurr = "{{__('symbol.currency')}}";
    let total = 0;

    $('.qty_cart').on('change', function(e) {
        total = 0;
        $('.qty_cart').each((i, elem) => {
            if ($(elem).data('id') != $(this).data('id')) {
                total += +$(elem).val() * +$(elem).data('price') * +currencyVal;
            }
        });
        $(this).val($(this).val() > 1 ? $(this).val() : 1);
        const price = $(this).val() * $(this).data('price') * currencyVal;
        const id = $(this).data('id');
        $(`.subtotal_price[data-id=${id}]`).text(symbolCurr + price.toFixed(2));
        total += +price;
        $('.grand_total').text(symbolCurr + total.toFixed(2))
    })
});
</script>
@endpush