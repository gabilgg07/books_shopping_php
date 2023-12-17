@extends("admin.layouts.master")
@push("page_title")
Langs Update
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

    <!-- Form inputs -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Update Lang</h5>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('manager.langs.update', $lang->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <fieldset class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Code</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="code" value="{{old('code', $lang->code)}}">
                        </div>
                        @error('code')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Country</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="country"
                                value="{{old('country', $lang->country)}}">
                        </div>
                        @error('country')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Upload lang image</label>
                        <div class="col-lg-10">
                            <input type="file" id="lang_image_input" class="form-control-uniform" data-fouc=""
                                name="image">
                            @error('image')
                            <label class="validation-invalid-label">{{$message}}</label>
                            @enderror
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg. Max
                                file
                                size 2Mb</span>
                        </div>
                    </div>
                    <div class="form-check form-check-switchery form-check-inline form-check-right mb-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery" name="is_active" data-fouc=""
                                {{old('is_active',$lang->is_active)?'checked':''}}>
                            Is Active?
                        </label>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <img src="{{$lang->image??''}}" alt="lang photo" id="lang_image"
                                class="{{$lang->image?'':'d-none'}}"
                                style="display:block; max-width:100%; max-height:50px;">
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i>
                        Insert</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form inputs -->

</div>
@endsection