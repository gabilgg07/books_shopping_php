@extends("admin.layouts.master")
@push("page_title")
Categories Index
@endpush
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title  d-flex justify-content-between float-none align-items-center">
                Categories Table
                <div class="box-btn">
                    <a href="{{route('admin.categories.create')}}" type="button" class="btn btn-block btn-success">
                        <i class="fas fa-plus mr-2"></i> Create New Category</a>
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
                        <th style="width: 200px;">Status</th>
                        <th style="width: 200px;">Controlls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->status}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning">Edit</a>
                            <form onsubmit="return confirm('Are you sure?')" method="post"
                                action="{{route('admin.categories.destroy', $category->id)}}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <input type="submit" style="width: 100px;" class="btn btn-outline-danger ml-1"
                                    value="Delete">
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

</div>

@endsection