@php
$model_name = $index_view_model['model_name'];
$table_name = $index_view_model['table_name'];
$models = $index_view_model['models'];
@endphp

@extends('admin.layouts.master')

@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\tables\datatables\datatables.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\selects\select2.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\datatables_basic.js')}}"></script>
@endpush

@push("page_title")
{{Str::headline($table_name)}} Index
@endpush

@section('content')
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($table_name)}} Index Table</h5>
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
        </div>
        <table class="table table-bordered datatable-basic">
            <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Group</th>
                    <th>Key</th>
                    <th>Text</th>
                    <th>Is Active</th>
                    <th class="w-auto">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->group}}</td>
                    <td>{{$model->key}}</td>
                    <td>{{Str::limit(json_encode($model->text),100)}}</td>
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
                                class="icon-pencil3 mr-2"></i>
                            Edit</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post"
                            action="{{route('manager.'.$table_name.'.destroy', $model->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" style="width: fit-content;" class="btn btn-outline-danger"><i
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