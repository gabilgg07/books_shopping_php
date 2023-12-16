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

<div class="content">
    <form action="{{route('manager.categories.update', $category->id)}}" method="POST" class="row">
        @csrf
        @method('PATCH')
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid border-0">
                        @foreach($langs as $key=>$lang)
                        <li class="nav-item"><a href="#{{$lang->code}}" class="nav-link {{$key === 0 ? 'active' : ''}}"
                                data-toggle="tab">{{$lang->code}}</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach($langs as $key=>$lang)
                        <div class="tab-pane fade {{$key === 0 ? 'show active' : ''}}" id="{{$lang->code}}">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="title[{{$lang->code}}]"
                                                value="{{ old('title.' . $lang->code, $category->getTranslation('title',$lang->code)) }}">
                                            @error('title.'.$lang->code)
                                            <label class="validation-invalid-label">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>



                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="parent_id">Select Parent Category</label>
                        <select class="custom-select form-control-border" id="parent_id" name="parent_id">
                            <option value="0">Parent Category</option>
                            @foreach ($categories as $parent_category)

                            <option value="{{$parent_category->id}}" @selected(old('parent_id', $category->
                                parent_id)===$parent_category->id)
                                >{{$parent_category->title}}</option>

                            <!-- <option value="{{$parent_category->id}}" 
                            @if($category->parent_id == $parent_category->id ||
                                old('parent_id') == $parent_category->id)
                                selected=" selected" @endif()>
                                {{$parent_category->title}}
                            </option> -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check form-check-switchery form-check-inline form-check-right">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery-danger" name="is_deleted"
                                data-fouc="" value="{{$category->is_deleted}}">
                            Is Deleted?
                        </label>
                    </div>
                    <!-- <div class="form-group">
                        <label>Group:</label>
                        <input type="text" name="group" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Key:</label>
                        <input type="text" name="key" class="form-control">
                    </div> -->

                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i> Insert</button>
            </div>
        </div>

    </form>
</div>
@endsection