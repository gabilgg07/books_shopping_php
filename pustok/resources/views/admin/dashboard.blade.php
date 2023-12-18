@extends("admin.layouts.master")
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\dashboard.js')}}"></script>
@endpush
@section("content")

<div class="content">
    @if (session('message'))
    <div class="alert alert-{{session('type')}} border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {{session('message')}}
    </div>
    @endif
</div>
@endsection