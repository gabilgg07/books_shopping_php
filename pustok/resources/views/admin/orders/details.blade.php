@extends('admin.layouts.master')

@push("page_title")
Order Details
@endpush

@section('content')
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="card mb-2 d-none alert alert-dismissible" id="alert_message">
        <button type="button" class="close close-alert"><span>×</span></button>
        <span class="msg-text"></span>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Order N°:{{$order->order_number}} Details</h5>
        </div>
        <div class="card-body row">
            <div class="col-lg-6">
                <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                    <blockquote class="blockquote d-flex mb-0">
                        @if ($order->user->image)
                        <div class="mr-3">
                            <img class="rounded-circle" src="{{$order->user->image}}" width="46" height="46" alt="">
                        </div>
                        @endif

                        <div>
                            <p class="mb-1">This Order placed by
                                <cite>{{$order->user->first_name.' '.$order->user->last_name}}</cite>
                            </p>
                            <footer class="blockquote-footer">Placed At:
                                <cite>{{$order->created_at}}</cite>
                            </footer>
                        </div>
                    </blockquote>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-body">
                    <div class="row text-center" style="justify-content: space-evenly;">
                        <div class="col-4">
                            <p><i class="icon-ticket icon-2x d-inline-block text-warning"></i></p>
                            <h5 class="font-weight-semibold mb-0">{{$order->total_count}}</h5>
                            <span class="text-muted font-size-sm">Order Items Count</span>
                        </div>

                        <div class="col-4">
                            <p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
                            <h5 class="font-weight-semibold mb-0">{{__('symbol.currency')}}{{$order->total_price}}</h5>
                            <span class="text-muted font-size-sm">Total Price</span>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.layouts.includes.mini_text', ['field_name'=>'Country',
            'field_value'=>$order->country,
            'color'=>'teal'])
            @include('admin.layouts.includes.mini_text', ['field_name'=>'City',
            'field_value'=>$order->city,
            'color'=>'purple'])
            @include('admin.layouts.includes.mini_text', ['field_name'=>'State',
            'field_value'=>$order->state,
            'color'=>'orange'])
            @include('admin.layouts.includes.mini_text', ['field_name'=>'Zip Code',
            'field_value'=>$order->zip_code,
            'color'=>'green'])
            @include('admin.layouts.includes.mini_text', ['field_name'=>'Address',
            'field_value'=>$order->address,
            'color'=>'pink', 'col'=>6])
            <div
                class="alert alert-{{$order->is_accepted === 1 ? 'success' : ($order->is_accepted === 0 ? 'danger':'warning')}} alert-styled-right alert-arrow-right alert-dismissible d-flex align-items-center m-auto">
                <span
                    class="font-weight-semibold">{{$order->is_accepted === 1 ? 'Approved' : ($order->is_accepted === 0 ? 'Rejected':'Pending')}}</span>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Discount Percent</th>
                                <th>Discount Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                            <tr>
                                <td>{{$item->book->title}}</td>
                                <td>{{__('symbol.currency')}}{{number_format($currPrice*$item->price,2,'.','')}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->discount?'%'.$item->discount:''}}</td>
                                <td>{{$item->discount_price?__('symbol.currency').number_format($item->discount_price*$currPrice,2,'.',''):''}}
                                </td>
                                <td>{{__('symbol.currency')}}{{number_format($currPrice*$item->total_price,2,'.','')}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            @if ($order->order_notes)
            <div class="col-lg-6">
                <div class="card border-left-3 border-left-info-400 border-right-3 border-right-info-400 rounded-0">
                    <div class="card-header">
                        <h6 class="card-title">
                            <span class="font-weight-semibold">Order Notes:</span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <code class="text-info" style="font-size: 16px;">{{ Str::headline($order->order_notes) }}</code>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection