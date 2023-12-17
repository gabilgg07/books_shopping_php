@extends("admin.layouts.master")
@push("page_title")
Categories Index
@endpush
@section("content")
<div class="content">
    <!-- Main content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title  d-flex justify-content-between float-none align-items-center">
                Categories Table
                <div class="box-btn">
                    <a href="{{route('manager.categories.create')}}" type="button" class="btn btn-block btn-success">
                        <i class="icon-plus-circle2 mr-2"></i> Add Category</a>
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
                        <!-- <th style="width: 40px">Label</th> -->
                        <th>Is Deleted</th>
                        <th>Controlls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            @if (!$category->is_deleted)
                            <span class="badge badge-success">No</span>
                            @else
                            <span class="badge badge-danger">Yes</span>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{route('manager.categories.edit', $category->id)}}" class="btn btn-warning"><i
                                    class="icon-pencil3 mr-2"></i> Edit</a>
                            <form onsubmit="return confirm('Are you sure?')" method="post"
                                action="{{route('manager.categories.destroy', $category->id)}}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" style="width: 100px;" class="btn btn-outline-danger ml-1"><i
                                        class="icon-trash mr-2"></i> Delete</button>
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