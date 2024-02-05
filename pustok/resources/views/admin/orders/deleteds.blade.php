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
Deleted Orders
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
            <h5 class="card-title">Deleted Orders Table</h5>
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
                        {{__('symbol.currency')}}{{number_format($currPrice*$order->total_price, 2, '.', '')}}
                    </td>
                    @if ($order->is_accepted !== null)
                    @if ($order->is_accepted === 1)
                    <td><span class="text-success">Approved</span></td>
                    @else
                    <td><span class="text-danger">Rejected</span></td>
                    @endif
                    @else
                    <td><span class="text-warning">Pending</span></td>
                    @endif
                    <td width='200' style="min-width: 200px;">
                        @if ($order->user->image)
                        <img src="{{$order->user->image}}" alt="" class="img-fluid" style="object-fit: cover; object-position: center; width:100px; height:100px; border-radius:50%;">
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{route('manager.orders.details', $order->id)}}" class="btn btn-info mb-1"><i class="mi-info mr-2"></i>
                            Info</a>
                        <a href="{{route('manager.orders.restore',$order->id)}}" class="btn btn-success mb-1"><i class="icon-pencil3 mr-2"></i>
                            Restore</a>
                        <form onsubmit="return confirm('Are you sure you want permanently delete this data?')" method="post" action="{{route('manager.orders.permanently_delete', $order->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" style="min-width:170px;" class="btn btn-danger mb-1"><i class="mi-delete-forever mr-2"></i>Permanently Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection