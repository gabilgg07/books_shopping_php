@php
$model_name = $deleteds_view_model['model_name'];
$table_name = $deleteds_view_model['table_name'];
$models = $deleteds_view_model['models'];
@endphp

@extends("admin.layouts.master")

@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\tables\datatables\datatables.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\selects\select2.min.js')}}"></script>
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
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Deleted At</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>
                            {{$model->title}}
                            @if ($model->parent_id==0)
                            <span class="badge badge-light badge-striped badge-striped-left border-left-info">parent
                                {{$model_name}}</span>
                            @endif
                        </td>
                        <td>{{$model->created_at}}</td>
                        <td>{{$model->deleted_at}}</td>
                        <td width='200'>
                            @if ($model->image)
                            <img src="{{$model->image}}" alt="{{$model->slug}}" class="img-fluid w-100"
                                style="object-fit: cover; object-position: center; height:100px;">
                            @endif
                        </td>
                        <td class="text-right d-flex {{$model->image?'flex-column':'align-items-center'}} justify-content-between border-0"
                            style="gap: 5px;">
                            <a href="{{route('manager.'.$table_name.'.show', $model->id)}}"
                                class="btn btn-info d-flex align-items-center"><i class="mi-info mr-2"></i>
                                Info</a>
                            <a href="{{route('manager.'.$table_name.'.restore', $model->id)}}"
                                class="btn btn-success d-flex align-items-center">
                                <i class="mi-restore-page mr-2"></i>
                                Restore</a>
                            <form onsubmit="return confirm('Are you sure you want permanently delete this data?')"
                                method="post"
                                action="{{route('manager.'.$table_name.'.permanently_delete', $model->id)}}"
                                class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" style="min-width:170px;"
                                    class="btn btn-danger d-flex align-items-center"><i
                                        class="mi-delete-forever mr-2"></i>Permanently Delete</button>
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