@php
$model_name = $create_view_model['model_name'];
$table_name = $create_view_model['table_name'];
$langs = $create_view_model['langs'];
$categories = $create_view_model['categories'];
$campaigns = $create_view_model['campaigns'];
@endphp

@extends('admin.layouts.master')

@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\form_inputs.js')}}"></script>
<script>
$(window).on('load', function() {
    let imagesArr = [];
    let placeholder = '';
    const images = $('.images');
    let imagesHtml = '';
    let dataTransfer = new DataTransfer();

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

            // console.log('files input: ', $("#images_input")[0].files);
        }
    }
    $("#images_input").change(function(e) {
        if (e.target.files.length) {

            let files = [...e.target.files];

            // console.log(files);
            // console.log(imagesArr);
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

            // console.log("dataTransfer", dataTransfer);

            $("#images_input")[0].files = dataTransfer.files;
            // console.log('this files: ', $("#images_input")[0].files);
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
{{Str::headline($table_name)}} Create
@endpush

@section('content')
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($table_name)}} Create Form</h5>
        </div>
        <!-- @if ($errors->any())
        <div class="card-body">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
    </div>

    <form action="{{route('manager.'.$table_name.'.store')}}" method="POST" class="row create_form"
        enctype="multipart/form-data">
        @csrf
        <div class="col-lg-6">
            @include('admin.layouts.includes.create_lang_tab',['field_name'=>'title','langs'=>$langs])
        </div>
        <div class="col-lg-6">
            @include('admin.layouts.includes.create_lang_tab_area',['field_name'=>'short_desc','langs'=>$langs])
        </div>
        <div class="col-lg-12">
            @include('admin.layouts.includes.create_lang_tab_area',['field_name'=>'long_desc','langs'=>$langs])
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.create_select_input',['default_value'=>'','field_label'=>'
                    Category','field_name'=>'category_id','select_items'=>$categories,'shown_field'=>'title'])

                    @include('admin.layouts.includes.create_select_input',['default_value'=>'','field_label'=>'
                    Campaign','field_name'=>'campaign_id','select_items'=>$campaigns,'shown_field'=>'title'])

                    @include('admin.layouts.includes.create_check',['field_name'=>'is_active'])
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.create_num_input',['field_name'=>'count','step'=>'1', 'colLbl'=>2,
                    'colInput'=>10]
                    )

                    @include('admin.layouts.includes.create_num_input',['field_name'=>'price','step'=>'0.01',
                    'colLbl'=>2, 'colInput'=>10])

                    @include('admin.layouts.includes.create_input',['field_name'=>'author'])

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
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i> Insert</button>
            </div>
        </div>
    </form>
</div>
@endsection