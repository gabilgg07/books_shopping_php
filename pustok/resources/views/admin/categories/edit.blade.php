@extends("admin.layouts.master")
@push("page_title")
Categories Create
@endpush
@push("theme_js")
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\form_inputs.js')}}"></script>
<script>
    $(window).on('load', function() {
        $("#lang_image_input").change(function(event) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#lang_image").attr(
                "src",
                URL.createObjectURL(event.target.files[0])
            );
            $("#lang_image").removeClass('d-none');
        });
    });
</script>
@endpush
@section("content")

<div class="content">
    <form action="{{route('manager.categories.update', $category->id)}}" method="POST" class="row">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <div class="card">
                @if (session('message'))
                <div class="alert alert-{{session('type')}} border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    {{session('message')}}
                </div>
                @endif
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid border-0">
                        @foreach($langs as $key=>$lang)
                        <li class="nav-item"><a href="#{{$lang->code}}" class="nav-link {{$key === 0 ? 'active' : ''}}" data-toggle="tab">{{$lang->code}}</a></li>
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
                                            <input type="text" class="form-control" name="title[{{$lang->code}}]" value="{{ old('title.' . $lang->code, $category->getTranslation('title',$lang->code)) }}">
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="parent_id">Select Parent Category</label>
                        <select class="custom-select form-control-border" id="parent_id" name="parent_id" value="{{old('parent_id', $category->
                                parent_id)}}">
                            <option value="0">Parent Category</option>
                            @foreach ($categories as $parent_category)
                            <option value="{{$parent_category->id}}" @selected((int)old('parent_id', $category->
                                parent_id)===$parent_category->id)
                                >{{$parent_category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check form-check-switchery form-check-inline form-check-right">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery" name="is_active" data-fouc="" {{old('is_active',$lang->is_active)?'checked':''}}>
                            Is Active?
                        </label>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Upload category image</label>
                        <div class="col-lg-9">
                            <input type="file" id="category_image_input" class="form-control-uniform" data-fouc="" name="image">
                            @error('image')
                            <label class="validation-invalid-label">{{$message}}</label>
                            @enderror
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg. Max
                                file
                                size 2Mb</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i> Insert</button>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{$category->image??''}}" alt="category photo" id="category_image" class="{{$category->image?'':'d-none'}}" style="display:block; max-width:100%; max-height:300px; border: 2px solid white; border-radius:20px; box-shadow: 0 0 7px 2px #0000008c;">
        </div>
    </form>
</div>
@endsection