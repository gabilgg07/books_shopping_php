@extends("admin.layouts.master")
@push("page_title")
Categories Create
@endpush
@push("theme_js")
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
@endpush
@section("content")
<div class="content-wrapper">
    <!-- Main content -->
    <div class="card card-primary m-3">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('manager.categories.store')}}">
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
                <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_deleted" name="is_deleted">
                    <label class="form-check-label" for="is_deleted">Is Deleted</label>
                </div> -->
                <div class="form-check form-check-switchery form-check-inline form-check-right">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input-switchery-danger" name="is_deleted" data-fouc="">
                        Is Deleted?
                    </label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="icon-database-insert mr-2"></i> Insert
                </button>
            </div>
        </form>
    </div>
    <!-- /.content -->

</div>
@endsection