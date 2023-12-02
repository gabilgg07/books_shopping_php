@extends("admin.layouts.master")
@push("page_title")
Categories Create
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
                        <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="card card-primary m-3">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="card-body">
                @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                <div class="form-group">
                    <label for="title">Title - [{{$lang}}]</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title[{{$lang}}]">
                </div>
                @endforeach
                <div class="form-group">
                    <label for="parent_id">Select Parent Category</label>
                    <select class="custom-select form-control-border" id="parent_id" name="parent_id">
                        <option value="0">Parent Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category?->id}}">{{$category?->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" checked id="status" name="status">
                    <label class="form-check-label" for="status">Status</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
    <!-- /.content -->

</div>
@endsection