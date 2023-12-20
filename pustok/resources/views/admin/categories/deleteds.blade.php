@extends("admin.layouts.master")
@push("page_title")
Deleted Categories
@endpush
@section("content")
<div class="content">
    <!-- Main content -->
    <div class="card">
        @if (session('message'))
        <div class="alert alert-{{session('type')}} border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {!!session('message')!!}
        </div>
        @endif
        <div class="card-header">
            <h3 class="card-title  d-flex justify-content-between float-none align-items-center">
                Deleted Categories Table
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
                        <th>Action</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td class="td_details">
                            <a href="{{route('manager.categories.show',$category->id)}}" class="text-grey-400 d-block w-100">
                                {{$category->title}}
                                @if ($category->parent_id==0)
                                <span class="badge badge-light badge-striped badge-striped-left border-left-info">parent
                                    category</span>
                                @endif
                            </a>
                        </td>
                        <td>{{$category->slug}}</td>
                        <td class="text-center">
                            <a href="{{route('manager.categories.restore', $category->id)}}" class="btn btn-success">
                                <i class="mi-restore-page mr-3 mi-2x"></i>
                                Restore</a>
                        </td>

                        <td width='200'>
                            @if ($category->image)
                            <img src="{{$category->image}}" alt="{{$category->slug}}" class="img-fluid w-100" style="object-fit: cover; object-position: center; height:100px;">
                            @endif
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