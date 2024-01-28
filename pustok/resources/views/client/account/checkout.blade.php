@php
$user = auth()->user();
@endphp

@extends("client.layouts.master")

@section("content")

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <!-- Checkout Form s-->
        <form action="{{route('client.account.placeOrder')}}" class="checkout-form" method="post">
            @csrf
            <div class="row row-40">
                <div class="col-lg-7 mb--20">
                    <!-- Shipping Address -->
                    <div id="shipping-form" class="mb--40">
                        <h4 class="checkout-title">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb--20">
                                <label for="first_name">First Name*</label>
                                <input type="text" placeholder="First Name" id="first_name"
                                    value="{{$user->first_name}}" readonly>
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="last_name">Last Name*</label>
                                <input type="text" placeholder="Last Name" id="last_name" value="{{$user->last_name}}"
                                    readonly>
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="email">Email Address*</label>
                                <input type="email" placeholder="Email Address" id="email" value="{{$user->email}}"
                                    readonly>
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="phone">Phone no*</label>
                                <input type="text" placeholder="Phone number" id="phone" name="phone"
                                    value="{{$user->phone}}">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mb--20">
                                <label for="address1">Address*</label>
                                <input type="text" placeholder="Address" id="address" name="address">
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="country">Country*</label>
                                <select class="nice-select" id="country" name="country">
                                    <option value="">Choose country</option>
                                    <option>Azerbaijan</option>
                                    <option>Turkey</option>
                                    <option>Rusian</option>
                                    <option>America</option>
                                    <option>Bangladesh</option>
                                    <option>China</option>
                                    <option>Great Britain</option>
                                    <option>India</option>
                                    <option>Japan</option>
                                </select>
                                @error('country')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="city">Town/City*</label>
                                <input type="text" placeholder="Town/City" id="city" name="city">
                                @error('city')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="state">State*</label>
                                <input type="text" placeholder="State" id="state" name="state">
                                @error('state')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="zip_code">Zip Code*</label>
                                <input type="text" placeholder="Zip Code" id="zip_code" name="zip_code">
                                @error('zip_code')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="order-note-block mt--30">
                        <label for="order_notes">Order notes</label>
                        <textarea id="order_notes" cols="30" rows="10" class="order-note" name="order_notes"
                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <!-- Cart Total -->
                        <div class="col-12">
                            <div class="checkout-cart-total">
                                <h2 class="checkout-title">YOUR ORDER</h2>
                                <h4>Product <span>Total</span></h4>
                                <ul>
                                    @foreach (Cart::content() as $cart)
                                    <li><span
                                            class="left">{{((array)json_decode($cart->name))[LaravelLocalization::getCurrentLocale()]}}
                                            X {{$cart->qty}}</span> <span
                                            class="right">{{__('symbol.currency')}}{{number_format($currPrice * $cart->price, 2, '.', '')}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- <p>Sub Total <span>$104.00</span></p> -->
                                <!-- <p>Shipping Fee <span>$00.00</span></p> -->
                                <!-- <h4>Grand Total <span>$104.00</span></h4> -->
                                <h4>Total
                                    <span>{{__('symbol.currency')}}{{number_format($currPrice * Cart::subtotal(), 2, '.', '')}}</span>
                                </h4>
                                <button class="place-order w-100">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection