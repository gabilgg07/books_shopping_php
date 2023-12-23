@extends('admin.layouts.master')
@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\tables\datatables\datatables.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\selects\select2.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\datatables_basic.js')}}"></script>
@endpush
@section('content')
<div class="content">
    <div class="card">
        @if (session('message'))
        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {{session('message')}}
        </div>
        @endif
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Language Lines</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a href="{{route('manager.language_line.create')}}" class="btn btn-success btn-sm"><i class="icon-plus-circle2 mr-2"></i> Add Language Line</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered datatable-basic">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Group</th>
                    <th>Key</th>
                    <th>Text</th>
                    <th>Is Deleted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $language)
                <tr>
                    <td>{{$language->id}}</td>
                    <td>{{$language->group}}</td>
                    <td>{{$language->key}}</td>
                    <td>{{json_encode($language->text)}}</td>
                    <td>
                        @if (!$language->is_deleted)
                        <span class="badge badge-success">No</span>
                        @else
                        <span class="badge badge-danger">Yes</span>
                        @endif
                    </td>
                    <td>
                        <div class="list-icons">
                            <a href="{{route('manager.language_line.edit', $language->id)}}" class="btn btn-info d-flex align-items-center"><i class="mi-info mr-2"></i> Info</a>
                            <a href="{{route('manager.language_line.edit', $language->id)}}" class="btn btn-warning d-flex align-items-center"><i class="icon-pencil3 mr-2"></i>
                                Edit</a>
                            <a href="{{route('manager.language_line.destroy', $language->id)}}" class="btn btn-outline-danger d-flex align-items-center"><i class="mi-delete mr-2"></i>
                                Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection