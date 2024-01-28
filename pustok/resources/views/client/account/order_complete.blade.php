@extends("client.layouts.master")

@section("content")

<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Order Complete</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="order-complete inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="order-complete-message text-center">
                    <h1>Thank you !</h1>
                    <p>Your order has been received.</p>
                </div>
                <ul class="order-details-list">
                    <li>Order Number: <strong>{{$order->order_number}}</strong></li>
                    <li>Date: <strong>{{$order->created_at->format('F d, Y')}}</strong></li>
                    <li>Total:
                        <strong>{{__('symbol.currency')}}{{number_format($currPrice * $order->total_price, 2, '.', '')}}</strong>
                    </li>
                    <!-- <li>Payment Method: <strong>Cash on Delivery</strong></li> -->
                </ul>
                <!-- <p>Pay with cash upon delivery.</p> -->
                <h3 class="order-table-title">Order Details</h3>
                <div class="table-responsive">
                    <table class="table order-details-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $orderItem)
                            <tr>
                                <td><a href="single-product.html">{{$orderItem->book->title}}</a> <strong>×
                                        {{$orderItem->qty}}</strong>
                                </td>
                                <td><span>{{__('symbol.currency')}}{{number_format($currPrice * ($orderItem->discount_price ?? $orderItem->price), 2, '.', '')}}</span>
                                </td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td><a href="single-product.html">Supreme Being Icon Glitch T-Shirt</a> <strong>×
                                        1</strong></td>
                                <td><span>$58.00</span></td>
                            </tr> -->
                        </tbody>
                        <tfoot>
                            <!-- <tr>
                                <th>Subtotal:</th>
                                <td><span>$117.00</span></td>
                            </tr>
                            <tr>
                                <th>Payment Method:</th>
                                <td>Cash on Delivery</td>
                            </tr> -->
                            <tr>
                                <th>Total:</th>
                                <td><span>{{__('symbol.currency')}}{{number_format($currPrice * $order->total_price, 2, '.', '')}}</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection