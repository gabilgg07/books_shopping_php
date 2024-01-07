@php
$model_name = $deleteds_view_model['model_name'];
$table_name = $deleteds_view_model['table_name'];
$models = $deleteds_view_model['models'];
@endphp

@extends("admin.layouts.master")

@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\tables\datatables\datatables.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\datatables_basic.js')}}"></script>
@endpush

@push("page_title")
Deleted {{Str::headline($table_name)}}
@endpush

@section("content")
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="card mb-2 d-none alert alert-dismissible" id="alert_message">
        <button type="button" class="close close-alert"><span>×</span></button>
        <span class="msg-text"></span>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title  d-flex justify-content-between float-none align-items-center">
                Deleted {{Str::headline($table_name)}} Table
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable-basic">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Full Name</th>
                        <th>E-mail</th>
                        <th>Is Admin</th>
                        <th>Deleted At</th>
                        <th>Image</th>
                        <th class="w-auto">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{Str::headline($model->first_name.' '.$model->last_name)}}</td>
                        <td>{{$model->email}}</td>
                        <td>
                            @if ($model->is_admin)
                            <span class="badge badge-success">Admin</span>
                            @else
                            <span class="badge badge-info">User</span>
                            @endif
                        </td>
                        <td>{{$model->deleted_at}}</td>
                        <td width='200'>
                            @if ($model->image)
                            <div class="image">
                                <img src="{{$model->image}}" alt="{{$model->first_name.'-'.$model->last_name}}" class="img-fluid border-1">
                            </div>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{route('manager.'.$table_name.'.show', $model->id)}}" class="btn btn-info"><i class="mi-info mr-2"></i> Info</a>
                            <a href="{{route('manager.'.$table_name.'.restore', $model->id)}}" class="btn btn-success">
                                <i class="mi-restore-page mr-3"></i>
                                Restore</a>
                            <form onsubmit="return confirm('Are you sure you want permanently delete this data?')" method="post" action="{{route('manager.'.$table_name.'.permanently_delete', $model->id)}}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" style="width:fit-content;" class="btn btn-danger ml-1"><i class="mi-delete-forever mr-2"></i>Permanently Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection