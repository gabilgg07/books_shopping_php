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
        <div class="col-lg-6">
            @include('admin.layouts.includes.create_lang_tab',['field_name'=>'title','langs'=>$langs])
        </div>
        <div class="col-lg-6">
            @include('admin.layouts.includes.create_lang_tab',['field_name'=>'short_desc','langs'=>$langs])
        </div>
        <div class="col-lg-6">
            @include('admin.layouts.includes.create_lang_tab',['field_name'=>'long_desc','langs'=>$langs])
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.includes.create_select_input',['field_label'=>'
                    Category','field_name'=>'category_id','select_items'=>$categories,'shown_field'=>'title'])

                    @include('admin.layouts.includes.create_select_input',['field_label'=>'
                    Campaign','field_name'=>'campaign_id','select_items'=>$campaigns,'shown_field'=>'title'])

                    @include('admin.layouts.includes.create_check',['field_name'=>'is_active'])
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i> Insert</button>
            </div>
        </div>

    </form>
</div>
@endsection