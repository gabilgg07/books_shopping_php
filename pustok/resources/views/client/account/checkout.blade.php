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
        <form action="" class="checkout-form">
            <div class="row row-40">
                <div class="col-lg-7 mb--20">
                    <!-- Shipping Address -->
                    <div id="shipping-form" class="mb--40">
                        <h4 class="checkout-title">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb--20">
                                <label for="firs_name">First Name*</label>
                                <input type="text" placeholder="First Name" id="firs_name" name="firs_name">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="last_name">Last Name*</label>
                                <input type="text" placeholder="Last Name" id="last_name" name="last_name">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="email">Email Address*</label>
                                <input type="email" placeholder="Email Address" id="email" name="email">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="phone">Phone no*</label>
                                <input type="text" placeholder="Phone number" id="phone" name="phone">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="address1">Address*</label>
                                <input type="text" placeholder="Address line 1" id="address1" name="address1">
                                <input type="text" placeholder="Address line 2" id="address2" name="address2">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="country">Country*</label>
                                <select class="nice-select" id="country" name="country">
                                    <option>Bangladesh</option>
                                    <option>China</option>
                                    <option>country</option>
                                    <option>India</option>
                                    <option>Japan</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="city">Town/City*</label>
                                <input type="text" placeholder="Town/City" id="city" name="city">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="state">State*</label>
                                <input type="text" placeholder="State" id="state" name="state">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label for="zip_code">Zip Code*</label>
                                <input type="text" placeholder="Zip Code" id="zip_code" name="zip_code">
                            </div>
                        </div>
                    </div>
                    <div class="order-note-block mt--30">
                        <label for="order_note">Order notes</label>
                        <textarea id="order_note" cols="30" rows="10" class="order-note" name="order_note"
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
                                    <li><span class="left">Cillum dolore tortor nisl X 01</span> <span
                                            class="right">$25.00</span></li>
                                    <li><span class="left">Auctor gravida pellentesque X 02 </span><span
                                            class="right">$50.00</span></li>
                                    <li><span class="left">Condimentum posuere consectetur X 01</span>
                                        <span class="right">$29.00</span>
                                    </li>
                                    <li><span class="left">Habitasse dictumst elementum X 01</span>
                                        <span class="right">$10.00</span>
                                    </li>
                                </ul>
                                <p>Sub Total <span>$104.00</span></p>
                                <p>Shipping Fee <span>$00.00</span></p>
                                <h4>Grand Total <span>$104.00</span></h4>
                                <div class="method-notice mt--25">
                                </div>
                                <div class="term-block d-flex align-items-center">
                                    <input type="checkbox" id="accept_terms" name="accept_terms" class="m-0 my-2">
                                    <label for="accept_terms" class="m-0 ml-2 my-2">I’ve read and accept the terms &
                                        conditions</label>
                                </div>
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