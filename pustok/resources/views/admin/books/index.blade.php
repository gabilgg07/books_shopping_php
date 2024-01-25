@php
$model_name = $index_view_model['model_name'];
$table_name = $index_view_model['table_name'];
$models = $index_view_model['models'];
@endphp

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
{{Str::headline($table_name)}} Index
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
            <h5 class="card-title">{{Str::headline($table_name)}} Index Table</h5>
            <div style="display: flex; gap: 10px;">
                <div class="box-btn">
                    <a href="{{route('manager.'.$table_name.'.create')}}" type="button" class="btn btn-block btn-success">
                        <i class="icon-plus-circle2 mr-2"></i> Add {{Str::headline($model_name)}}</a>
                </div>
                <div class="box-btn">
                    <a href="{{route('manager.'.$table_name.'.deleteds')}}" class="btn btn-danger">
                        <i class="mi-delete-sweep mr-1" style="font-size: 18px;"></i>
                        Deleted {{Str::headline($table_name)}} Table</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered datatable-basic">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Count</th>
                    <th>Category</th>
                    <th>Is Active</th>
                    <th>Image</th>
                    <th class="w-auto">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>
                        {{$model->title}}
                    </td>
                    <td>
                        {{number_format($model->price, 2, '.', '')}}
                    </td>
                    <td>{{$model->count}}</td>
                    <td>{{$model->category->title}}</td>
                    <td class="text-center">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery isActive" id="{{$model->id}}" data-fouc="" {{$model->is_active?'checked':''}}>
                        </label>
                    </td>
                    <td width='200'>
                        @php
                        $image = $model->bookImages->where('is_main', 1)->first();
                        @endphp
                        @if ($image)
                        <img src="{{$image->image}}" alt="{{$model->slug}}" class="img-fluid w-100" style="object-fit: cover; object-position: center; height:100px;">
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{route('manager.'.$table_name.'.show', $model->id)}}" class="btn btn-info mb-1"><i class="mi-info mr-2"></i> Info</a>
                        <a href="{{route('manager.'.$table_name.'.edit',$model->id)}}" class="btn btn-warning mb-1"><i class="icon-pencil3 mr-2"></i>
                            Edit</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post" action="{{route('manager.'.$table_name.'.destroy', $model->id)}}" class="d-inline-block">
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

@push('custom_js')
<script>
    $(document).ready(function() {

        let ids = [];
        const url = "{{ route('manager.'.$table_name.'.change_active') }}";
        if ($(".isActive").length) {
            $(".datatable-basic").DataTable({
                drawCallback: function() {
                    if (ids.length) {
                        ids.forEach((value, index, array) => {
                            deactiveAll(value.ids);
                        })
                    }
                    const alertElement = $("#alert_message");
                    let msg = "";

                    $(".close-alert").click(function() {
                        alertElement.addClass("d-none");
                    });

                    $(".datatable-basic tbody").off("click", ".isActive");
                    $(".datatable-basic tbody").on("click", ".isActive", (e) => {
                        changeIsActive(e, msg, alertElement, url, ids);
                    });
                },
            });
        } else {
            $(".datatable-basic").DataTable();
        }
    });
</script>
@endpush