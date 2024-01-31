@extends('admin.layouts.master')

@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\tables\datatables\datatables.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\datatables_basic.js')}}"></script>
@endpush

@push("page_title")
Orders Index
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
            <h5 class="card-title">Orders Table</h5>
            <div style="display: flex; gap: 10px;">
                <div class="box-btn">
                    <a href="{{route('manager.orders.deleteds')}}" class="btn btn-danger">
                        <i class="mi-delete-sweep mr-1" style="font-size: 18px;"></i>
                        Deleted Orders Table</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered datatable-basic">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>User</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Is Accept</th>
                    <th>Image</th>
                    <th class="w-auto">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        {{$order->user->first_name}} {{$order->user->last_name}}
                    </td>
                    <td>{{$order->total_count}}</td>
                    <td>
                        {{number_format($order->total_price, 2, '.', '')}}
                    </td>
                    @if ($order->is_accepted !== null)
                    @if ($order->is_accepted === true)
                    <td><span class="badge badge-success">Approved</span></td>
                    @else
                    <td><span class="badge badge-danger">Rejected</span></td>
                    @endif
                    @else
                    <td><span class="badge badge-warning">Pending</span></td>
                    @endif
                    <td width='200' class="text-center">
                        @if ($order->user->image)
                        <img src="{{$order->user->image}}" alt="" class="img-fluid" style="object-fit: cover; object-position: center; width:100px; height:100px; border-radius:50%;">
                        @endif
                    </td>
                    <td class="text-right">

                        @if ($order->is_accepted !== null)
                        @if ($order->is_accepted === true)
                        <a href="{{route('manager.orders.reject',$order->id)}}" class="btn btn-danger mb-1"><i class="icon-blocked mr-2"></i>
                            To Reject</a>
                        @else
                        <a href="{{route('manager.orders.accept', $order->id)}}" class="btn btn-success mb-1"><i class="icon-checkmark4 mr-2"></i>To Accept</a>
                        @endif
                        @else
                        <a href="{{route('manager.orders.accept', $order->id)}}" class="btn btn-success mb-1"><i class="icon-checkmark4 mr-2"></i>To Accept</a>
                        <a href="{{route('manager.orders.reject',$order->id)}}" class="btn btn-danger mb-1"><i class="icon-blocked mr-2"></i>
                            To Reject</a>
                        @endif

                        <a href="{{route('manager.orders.details', $order->id)}}" class="btn btn-info mb-1"><i class="mi-info mr-2"></i>
                            Info</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post" action="{{route('manager.orders.destroy', $order->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger mb-1"><i class="mi-delete mr-2"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection