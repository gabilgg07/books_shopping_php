@php
$model_name = $deleteds_view_model['model_name'];
$table_name = $deleteds_view_model['table_name'];
$models = $deleteds_view_model['models'];
@endphp
@extends("admin.layouts.master")
@push("page_title")
Deleted {{Str::headline($table_name)}}
@endpush
@section("content")
<div class="content">
    <!-- Main content -->
    <div class="card">
        @include('admin.layouts.includes.alert')
        <div class="card-header">
            <h3 class="card-title  d-flex justify-content-between float-none align-items-center">
                Deleted {{Str::headline($table_name)}} Table
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Code</th>
                        <th>Country</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{Str::upper($model->code)}}</td>
                        <td>{{Str::headline($model->country)}}</td>
                        <td width='200'>
                            @if ($model->image)
                            <img src="{{$model->image}}" alt="{{$model_name.'-'.$model->id}}" class="img-fluid w-100" style="object-fit: cover; object-position: center; height:100px;">
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
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /.content -->

@endsection