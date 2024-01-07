@php
$model_name=$edit_view_model['model_name'];
$table_name=$edit_view_model['table_name'];
$model=$edit_view_model['model'];
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
        <form method="post" action="{{route('manager.'. $table_name .'.update', $model->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.layouts.includes.edit_input',['field_name'=>'first_name','field_value'=>$model->first_name])
                            @include('admin.layouts.includes.edit_input',['field_name'=>'last_name','field_value'=>$model->last_name])
                            @include('admin.layouts.includes.edit_input_by_type', ['field_name'=>'email',
                            'type'=>'email','field_value'=>$model->email])

                            @include('admin.layouts.includes.create_input_by_type', ['field_name'=>'new_password',
                            'type'=>'password'])

                            @include('admin.layouts.includes.create_input_by_type', ['field_name'=>'repeat_password',
                            'type'=>'password'])
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.layouts.includes.edit_input',['field_name'=>'phone','field_value'=>$model->phone])
                            @include('admin.layouts.includes.edit_check',['field_name'=>'is_active','field_value'=>$model->is_active])
                            @include('admin.layouts.includes.edit_check',['field_name'=>'is_admin','field_value'=>$model->is_admin])
                            @include('admin.layouts.includes.image_input',['model_name'=>'lang'])
                            @include('admin.layouts.includes.image',['field_value'=>$model->image,
                            'col_count'=>6,'class_name'=>'img_selected'])
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><i class="icon-database-edit2 mr-2"></i>
                            Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection