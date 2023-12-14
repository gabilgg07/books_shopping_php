@extends("admin.layouts.master")
@push("page_title")
Langs Index
@endpush
@section("content")
<div class="content">

    <!-- Basic datatable -->
    <div class="card">

        @if (session('message'))
        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {{session('message')}}
        </div>
        @endif
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Langs
            </h5>
            <div class="header-elements">
                <a href="{{route('manager.langs.create')}}" class="btn btn-success">Add Language</a>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Is Deleted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($langs as $lang)
                <tr>
                    <td>{{$lang->code}}</td>
                    <td>{{$lang->country}}</td>
                    <td>{{$lang->image}}</td>
                    <td>
                        @if (!$lang->is_deleted)
                        <span class="badge badge-success">No</span>
                        @else
                        <span class="badge badge-danger">Yes</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('manager.langs.edit',$lang->id)}}" class="btn btn-warning"><i
                                class="icon-pencil3 mr-2"></i> Edit</a>
                        <a href="{{route('manager.langs.destroy',$lang->id)}}" class="btn btn-danger"><i
                                class="icon-file-minus2 mr-2"></i>Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

</div>
@endsection