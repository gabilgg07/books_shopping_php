@extends('admin.layouts.master')

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
        <table class="table table-bordered">
            <thead>
                <tr>
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
                        <!-- <div class="list-icons">
                            <a href="{{route('manager.language_line.edit',$language->id)}}" class="list-icons-item"><i
                                    class="icon-pencil7"></i></a>
                            <a href="{{route('manager.language_line.destroy',$language->id)}}"
                                class="list-icons-item"><i class="icon-trash"></i></a>
                        </div> -->
                        <a href="{{route('manager.language_line.edit', $language->id)}}" class="btn btn-warning"><i class="icon-pencil3 mr-2"></i> Edit</a>
                        <a href="{{route('manager.language_line.destroy', $language->id)}}" class="btn btn-outline-danger"><i class="icon-trash mr-2"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection