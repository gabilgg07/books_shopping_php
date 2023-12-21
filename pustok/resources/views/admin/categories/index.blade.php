@extends("admin.layouts.master")
@push("page_title")
Categories Index
@endpush
@section("content")
<div class="content">
    <!-- Main content -->
    <div class="card">
        @if (session('message'))
        <div class="alert alert-{{session('type')}} border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {{session('message')}}
        </div>
        @endif
        <div class="card-header">
            <h3 class="card-title  d-flex justify-content-between float-none align-items-center">
                Categories Table
                <div style="display: flex; gap: 10px;">
                    <div class="box-btn">
                        <a href="{{route('manager.categories.create')}}" type="button" class="btn btn-block btn-success">
                            <i class="icon-plus-circle2 mr-2"></i> Add Category</a>
                    </div>
                    <div class="box-btn">
                        <a href="{{route('manager.categories.deleteds')}}" class="btn btn-danger">
                            <i class="mi-delete-sweep mr-1" style="font-size: 18px;"></i>
                            Deleted Categories</a>
                    </div>
                </div>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Is Avtive</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>
                            {{$category->title}}
                            @if ($category->parent_id==0)
                            <span class="badge badge-light badge-striped badge-striped-left border-left-info">parent
                                category</span>
                            @endif
                        </td>
                        <td>{{$category->slug}}</td>
                        <td>
                            @if ($category->is_active)
                            <span class="badge badge-success">Yes</span>
                            @else
                            <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                        <td width='200'>
                            @if ($category->image)
                            <img src="{{$category->image}}" alt="{{$category->slug}}" class="img-fluid w-100" style="object-fit: cover; object-position: center; height:100px;">
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{route('manager.categories.show', $category->id)}}" class="btn btn-info"><i class="mi-info mr-2"></i> Info</a>
                            <a href="{{route('manager.categories.edit', $category->id)}}" class="btn btn-warning"><i class="mi-mode-edit mr-2"></i> Edit</a>
                            <form onsubmit="return confirm('Are you sure?')" method="post" action="{{route('manager.categories.destroy', $category->id)}}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" style="width: 100px;" class="btn btn-outline-danger ml-1"><i class="mi-delete mr-2"></i> Delete</button>
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