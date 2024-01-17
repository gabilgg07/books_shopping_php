@php
$model_name=$edit_view_model['model_name'];
$table_name=$edit_view_model['table_name'];
$model=$edit_view_model['model'];
$langs=$edit_view_model['langs'];
$json_field=$edit_view_model['json_field'];
$select_items=$edit_view_model['select_items'];
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
{{Str::headline($model_name)}} Edit
@endpush

@section("content")
<div class="content">
    @include('admin.layouts.includes.alert')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($model_name)}} Edit</h5>
        </div>
    </div>
    <form action="{{route('manager.'. $table_name .'.update', $model->id)}}" method="POST" class="row"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')


        <div class="col-lg-6">
            @include('admin.layouts.includes.edit_lang_tab',['field_name'=>'title','langs'=>$langs,'field_value'=>$json_field])
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.edit_select_input',['field_label'=>'Parent
                    Category','field_name'=>'parent_id','select_items'=>$select_items,'shown_field'=>'title','field_value'=>$model->parent_id])

                    @include('admin.layouts.includes.edit_check',['field_name'=>'is_active','field_value'=>$model->is_active])

                    @include('admin.layouts.includes.edit_input',['field_name'=>'author','field_value'=>$model->author])

                    @include('admin.layouts.includes.image',['field_value'=>$model->image,
                    'col_count'=>6,'class_name'=>'img_selected'])
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="icon-database-edit2 mr-2"></i> Update</button>
            </div>
        </div>
    </form>
</div>
@endsection