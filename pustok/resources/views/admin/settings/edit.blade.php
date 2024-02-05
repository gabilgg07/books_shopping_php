@extends("admin.layouts.master")

@push("theme_js")
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\form_inputs.js')}}"></script>
<script>
$(window).on('load', function() {
    $(".image_input").change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $(`.${$(this).attr('name')}`).attr(
            "src",
            URL.createObjectURL(event.target.files[0])
        );
        $(`.${$(this).attr('name')}`).removeClass('d-none');
    });
});
</script>
@endpush

@push("page_title")
Settings Edit
@endpush

@section("content")
<div class="content">
    @include('admin.layouts.includes.alert')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Settings Edit</h5>
        </div>
        @if ($errors->any())
        <div class="card-body">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="card p-3">
        <form action="{{route('manager.settings.update')}}" method="POST" class="row" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        @include('admin.layouts.includes.edit_lang_tab',['field_name'=>'location_title','langs'=>$langs,'field_value'=>$location_title])
                    </div>
                    <div class="col-lg-12">
                        @include('admin.layouts.includes.edit_lang_tab_area',['field_name'=>'location_desc','langs'=>$langs,'field_value'=>$location_desc])
                    </div>
                    <div class="col-lg-12">
                        @include('admin.layouts.includes.edit_lang_tab_area',['field_name'=>'copy_heading','langs'=>$langs,'field_value'=>$copy_heading])
                    </div>
                    <div class="col-lg-12">
                        @include('admin.layouts.includes.edit_lang_tab_area',['field_name'=>'copy_text','langs'=>$langs,'field_value'=>$copy_text])
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        @include('admin.layouts.includes.edit_check',['field_name'=>'is_active','field_value'=>$model->is_active])

                        @include('admin.layouts.includes.edit_num_input',['field_name'=>'shipping_percent',
                        'field_value'=>$model->shipping_percent,'step'=>'1', 'colLbl'=>2,
                        'colInput'=>10]
                        )

                        @include('admin.layouts.includes.edit_input',['field_name'=>'address','field_value'=>$model->address])

                        @include('admin.layouts.includes.edit_input',['field_name'=>'email','field_value'=>$model->email])

                        @include('admin.layouts.includes.edit_input',['field_name'=>'phone','field_value'=>$model->phone])

                        @include('admin.layouts.includes.edit_input',['field_name'=>'facebook','field_value'=>$model->facebook])

                        @include('admin.layouts.includes.edit_input',['field_name'=>'twitter','field_value'=>$model->twitter])

                        @include('admin.layouts.includes.edit_input',['field_name'=>'google_plus','field_value'=>$model->google_plus])

                        @include('admin.layouts.includes.edit_input',['field_name'=>'youtube','field_value'=>$model->youtube])

                        @include('admin.layouts.includes.edit_input',['field_name'=>'instagram','field_value'=>$model->instagram])


                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Upload Logo Image:</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="image_input"
                                                class="form-control-uniform-custom image_input" data-fouc=""
                                                name="logo_image">
                                            @error('logo_image')
                                            <label class="validation-invalid-label">{{$message}}</label>
                                            @enderror
                                            @error('validation.mimes')
                                            <label class="validation-invalid-label">{{$message}}</label>
                                            @enderror

                                            <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg,
                                                svg, webp. Max
                                                file
                                                size 2Mb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Upload Footer Logo Image:</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="image_input"
                                                class="form-control-uniform-custom image_input" data-fouc=""
                                                name="logo_footer_image">
                                            @error('logo_footer_image')
                                            <label class="validation-invalid-label">{{$message}}</label>
                                            @enderror
                                            @error('validation.mimes')
                                            <label class="validation-invalid-label">{{$message}}</label>
                                            @enderror

                                            <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg,
                                                svg, webp. Max
                                                file
                                                size 2Mb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <label>Logo Image:</label>
                            @include('admin.layouts.includes.image',['field_value'=>asset($model->logo_image),
                            'col_count'=>6,'class_name'=>'img_selected logo_image'])
                        </div>
                        <div class="col-lg-6">

                            <label>Logo Footer Image:</label>
                            @include('admin.layouts.includes.image',['field_value'=>asset($model->logo_footer_image),
                            'col_count'=>6,'class_name'=>'img_selected logo_footer_image'])
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><i class="icon-database-edit2 mr-2"></i>
                        Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection