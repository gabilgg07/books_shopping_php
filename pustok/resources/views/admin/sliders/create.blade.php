@php
$model_name = $create_view_model['model_name'];
$table_name = $create_view_model['table_name'];
$langs = $create_view_model['langs'];
@endphp

@extends('admin.layouts.master')

@push('theme_js')
<style>
@font-face {
    font-family: summernote;
    font-style: normal;
    font-weight: 400;
    src: url("{{asset('admin/global_assets/css/icons/summernote/summernote.eot')}}");
    src: url("{{asset('admin/global_assets/css/icons/summernote/summernote-1.eot')}}") format("embedded-opentype"),
    url("{{asset('admin/global_assets/css/icons/summernote/summernote.txt')}}") format("woff"),
    url("{{asset('admin/global_assets/css/icons/summernote/summernote-1.txt')}}") format("truetype")
}
</style>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\editors\summernote\summernote.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\form_inputs.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\editor_summernote.js')}}"></script>
<script>
$(window).on('load', function() {
    $("#image_input").change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#image").attr(
            "src",
            URL.createObjectURL(event.target.files[0])
        );
        $("#image").removeClass('d-none');
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
    </div>
    <form action="{{route('manager.'.$table_name.'.store')}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            @include('admin.layouts.includes.create_lang_tab_area',['field_name'=>'text_content','langs'=>$langs])
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.create_check',['field_name'=>'is_active'])

                    @include('admin.layouts.includes.image_input',['model_name'=>$model_name])

                    @include('admin.layouts.includes.image',['field_value'=>'',
                    'col_count'=>6,'class_name'=>'img_selected'])
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