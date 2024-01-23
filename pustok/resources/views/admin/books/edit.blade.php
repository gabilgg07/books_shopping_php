@php
$model_name=$edit_view_model['model_name'];
$table_name=$edit_view_model['table_name'];
$model=$edit_view_model['model'];
$langs=$edit_view_model['langs'];
$categories=$edit_view_model['categories'];
$campaigns=$edit_view_model['campaigns'];
$json_title=$edit_view_model['json_title'];
$json_short_descs=$edit_view_model['json_short_descs'];
$json_long_descs=$edit_view_model['json_long_descs'];
$images=$edit_view_model['images'];
@endphp

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
    let imagesArr = [];
    let removed_img_ids = [];
    let placeholder = '';
    const images = $('.images');
    let imagesHtml = '';
    let dataTransfer = new DataTransfer();
    $('.img_remove').on('click', function(e) {
        const id = $(e.currentTarget).data('id');
        removed_img_ids.push(id);
        $(e.currentTarget).parent().parent().remove();
        $('.deleted_images').val(removed_img_ids);
        console.log($('.deleted_images').val());
    });

    function onRemoveSelectedImg() {
        placeholder = '';
        if (imagesArr.length) {
            dataTransfer = new DataTransfer();
            imagesArr.forEach((image, index) => {
                dataTransfer.items.add(image);
                if (index !== 0) {
                    placeholder += ', '
                }
                placeholder += image.name;
            });

            $('.filename').text(placeholder);
            $("#images_input")[0].files = dataTransfer.files;
        }
    }
    $("#images_input").change(function(e) {
        if (e.target.files.length) {

            let files = [...e.target.files];

            files.forEach(file => {

                if (imagesArr.length && imagesArr.some((value) => value.name ===
                        file.name && value.size === file.size)) {
                    console.log('This ' + file.name + ' file with size:' + file.size +
                        ' alredy added');
                } else {
                    imagesArr.push(file);
                }
            });

            dataTransfer = new DataTransfer();
            placeholder = '';
            imagesHtml = '';
            imagesArr.forEach((image, index) => {
                dataTransfer.items.add(image);
                if (index !== 0) {
                    placeholder += ', '
                }
                placeholder += image.name;
                imagesHtml += `<div class="col-lg-4 mb-2">
                                    <div class="img_box">
                                        <img src="${URL.createObjectURL(image)}" alt="" id="image" class="book_image">
                                        <span class="img_delete" data-name="${image.name}_${image.size}">
                                        <i class="icon-bin"></i></span>
                                        <div class="radio_is_main">
                                        <input type="radio" name="is_main" value="${image.name}_${image.size}" />
                                        </div>
                                    </div>
                                </div>`;
            });

            images.html(imagesHtml);

            $('.filename').text(placeholder);

            $("#images_input")[0].files = dataTransfer.files;
            $('.img_delete').on('click', function(e) {
                const name = $(e.currentTarget).data('name');
                imagesArr = imagesArr.filter((value) => value.name + '_' + value.size !== name);
                onRemoveSelectedImg();
                $(e.currentTarget).parent().parent().remove();
            });
        }
    });
});
</script>
@endpush

@push("page_title")
{{Str::headline($model_name)}} Edit
@endpush

@section("content")
<div class="content">
    @include('admin.layouts.includes.alert')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($model_name)}} Edit</h5>
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
    <form action="{{route('manager.'. $table_name .'.update', $model->id)}}" method="POST" class="row"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="col-lg-6">
            @include('admin.layouts.includes.edit_lang_tab',['field_name'=>'title','langs'=>$langs,'field_value'=>$json_title])
        </div>
        <div class="col-lg-6">
            @include('admin.layouts.includes.edit_lang_tab',['field_name'=>'short_desc','langs'=>$langs,'field_value'=>$json_short_descs])
        </div>
        <div class="col-lg-12">
            @include('admin.layouts.includes.edit_lang_tab',['field_name'=>'long_desc','langs'=>$langs,'field_value'=>$json_long_descs])
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.edit_select_input',['field_label'=>'Category','field_name'=>'category_id','select_items'=>$categories,'shown_field'=>'title','field_value'=>$model->category_id])

                    @include('admin.layouts.includes.edit_select_input',['field_label'=>'Campaign','field_name'=>'campaign_id','select_items'=>$campaigns,'shown_field'=>'title','field_value'=>$model->campaign_id])

                    @include('admin.layouts.includes.edit_check',['field_name'=>'is_active','field_value'=>$model->is_active])
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.edit_num_input',['field_name'=>'count',
                    'field_value'=>$model->count,'step'=>'1', 'colLbl'=>2,
                    'colInput'=>10]
                    )

                    @include('admin.layouts.includes.edit_num_input',['field_name'=>'price','field_value'=>$model->price,'step'=>'0.01',
                    'colLbl'=>2, 'colInput'=>10])

                    @include('admin.layouts.includes.edit_input',['field_name'=>'author','field_value'=>$model->author])

                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Upload Images and <br /> Choose main image:</label>
                        <div class="col-lg-9">
                            <input type="file" id="images_input" class="form-control-uniform-custom" data-fouc=""
                                name="images[]" multiple>
                            @error('images')
                            <label class="validation-invalid-label">{{$message}}</label>
                            @enderror
                            @error('images.*')
                            <label class="validation-invalid-label">{{$message}}</label>
                            @enderror
                            @error('validation.mimes')
                            <label class="validation-invalid-label">{{$message}}</label>
                            @enderror
                            @error('is_main')
                            <label class="validation-invalid-label">{{$message}}</label>
                            @enderror
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg, svg, webp. Max
                                file
                                size 2Mb</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row images">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <input type="hidden" name="deleted_images" class="deleted_images">
                                @foreach ($images as $image)
                                <div class="col-lg-4 mb-2">
                                    <div class="img_box">
                                        <img src="{{ asset($image->image) }}" alt="" class="book_image">
                                        <span class="img_delete img_remove" data-id="{{ $image->id }}">
                                            <i class="icon-bin"></i>
                                        </span>
                                        <div class="radio_is_main">
                                            <input type="radio" name="is_main" value="{{ $image->id }}"
                                                {{ $image->is_main ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="icon-database-edit2 mr-2"></i> Update</button>
            </div>
        </div>
    </form>
</div>
@endsection