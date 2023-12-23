@php
$model_name = $index_view_model['model_name'];
$table_name = $index_view_model['table_name'];
$models = $index_view_model['models'];
@endphp
@extends("admin.layouts.master")
@push("page_title")
{{Str::headline($table_name)}} Index
@endpush
@section("content")
<div class="content">
    <div class="card">
        @include('admin.layouts.includes.alert')
        <div class="card-header">
            <h3 class="card-title  d-flex justify-content-between float-none align-items-center">
                {{Str::headline($table_name)}} Index Table
                <div style="display: flex; gap: 10px;">
                    <div class="box-btn">
                        <a href="{{route('manager.'.$table_name.'.create')}}" type="button"
                            class="btn btn-block btn-success">
                            <i class="icon-plus-circle2 mr-2"></i> Add {{Str::headline($model_name)}}</a>
                    </div>
                    <div class="box-btn">
                        <a href="{{route('manager.'.$table_name.'.deleteds')}}" class="btn btn-danger">
                            <i class="mi-delete-sweep mr-1" style="font-size: 18px;"></i>
                            Deleted {{Str::headline($table_name)}} Table</a>
                    </div>
                </div>
            </h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Code</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Is Active</th>
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
                        <div class="image">
                            <img src="{{$model->image}}" alt="{{$model->code.'-'.$model->country}}"
                                class="img-fluid border-1">
                        </div>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($model->is_active)
                        <span class="badge badge-success">Yes</span>
                        @else
                        <span class="badge badge-danger">No</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{route('manager.'.$table_name.'.show', $model->id)}}" class="btn btn-info"><i
                                class="mi-info mr-2"></i> Info</a>
                        <a href="{{route('manager.'.$table_name.'.edit',$model->id)}}" class="btn btn-warning"><i
                                class="icon-pencil3 mr-2"></i> Edit</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post"
                            action="{{route('manager.'.$table_name.'.destroy', $model->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" style="width: fit-content;" class="btn btn-outline-danger ml-1"><i
                                    class="mi-delete mr-2"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection