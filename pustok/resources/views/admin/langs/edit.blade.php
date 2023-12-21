@php
$model_name=$edit_view_model['model_name'];
$route=$edit_view_model['route'];
$model=$edit_view_model['model'];
@endphp
@extends("admin.layouts.master")
@push("page_title")
{{Str::headline($model_name)}} Edit
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
@section("content")
<div class="content">
    <div class="card">
        @include('admin.layouts.includes.alert')
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($model_name)}} Edit</h5>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('manager.'. $route .'.update', $model->id)}}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <fieldset class="mb-3">
                    @include('admin.layouts.includes.edit_input',['field_name'=>'code','field_value'=>$model->code])
                    @include('admin.layouts.includes.edit_input',['field_name'=>'country','field_value'=>$model->country])
                    @include('admin.layouts.includes.edit_check',['field_name'=>'is_active','field_value'=>$model->is_active])
                    @include('admin.layouts.includes.image_input',['model_name'=>$model_name])
                    @include('admin.layouts.includes.image',['field_value'=>$model->image, 'class_name' =>'lang-flag'])
                </fieldset>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i>
                        Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection