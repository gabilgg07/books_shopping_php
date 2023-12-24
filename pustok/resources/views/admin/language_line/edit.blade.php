@php
$model_name = $edit_view_model['model_name'];
$table_name = $edit_view_model['table_name'];
$model=$edit_view_model['model'];
$langs = $edit_view_model['langs'];
@endphp

@extends('admin.layouts.master')

@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
@endpush

@push("page_title")
{{Str::headline($table_name)}} Edit
@endpush

@section('content')
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($model_name)}} Edit</h5>
        </div>
    </div>
    <form action="{{route('manager.'. $table_name .'.update', $model->id)}}" method="POST" class="row">
        @csrf
        @method('PATCH')
        <div class="col-lg-8">
            @include('admin.layouts.includes.edit_lang_tab',['field_name'=>'text','langs'=>$langs,
            'field_value'=>$model->text])
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.edit_input_top_label',['field_name'=>'group',
                    'field_value'=>$model->group])
                    @include('admin.layouts.includes.edit_input_top_label',['field_name'=>'key',
                    'field_value'=>$model->key])
                    @include('admin.layouts.includes.edit_check',['field_name'=>'is_active','field_value'=>$model->is_active])
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success"><i class="icon-database-edit2 mr-2"></i> Update</button>
            </div>
        </div>

    </form>
</div>


@endsection