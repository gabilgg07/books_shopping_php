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
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Is Active</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $key=>$model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>
                        {{$model->title}}
                        @if ($model->parent_id==0)
                        <span class="badge badge-light badge-striped badge-striped-left border-left-info">parent
                            {{$model_name}}</span>
                        @endif
                    </td>
                    <td>{{$model->slug}}</td>
                    <td class="text-center">
                        @if ($model->is_active)
                        <span class="badge badge-success">Yes</span>
                        @else
                        <span class="badge badge-danger">No</span>
                        @endif
                    </td>
                    <td width='200'>
                        @if ($model->image)
                        <img src="{{$model->image}}" alt="{{$model->slug}}" class="img-fluid w-100"
                            style="object-fit: cover; object-position: center; height:100px;">
                        @endif
                    </td>
                    <td class="text-right d-flex {{$model->image?'flex-column':'align-items-center'}} justify-content-between
                    {{$key===0?'border-top-0':''}} 
                     border-left-0" style="gap: 5px; border-width: 0.5px;">
                        <a href="{{route('manager.'.$table_name.'.show', $model->id)}}"
                            class="btn btn-info d-flex align-items-center"><i class="mi-info mr-2"></i> Info</a>
                        <a href="{{route('manager.'.$table_name.'.edit',$model->id)}}"
                            class="btn btn-warning d-flex align-items-center"><i class="icon-pencil3 mr-2"></i>
                            Edit</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post"
                            action="{{route('manager.'.$table_name.'.destroy', $model->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger d-flex align-items-center w-100"><i
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