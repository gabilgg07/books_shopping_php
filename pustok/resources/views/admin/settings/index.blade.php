@extends('admin.layouts.master')

@push("page_title")
Settings
@endpush

@section('content')
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="d-flex align-items-start flex-column flex-md-row">
        <div class="w-100 overflow-auto order-2 order-md-1">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12">
                        <h4 class="font-weight-semibold mb-1 d-flex justify-content-between align-items-center">
                            <span class="text-default text-info">Settings</span>

                            <div class="box-btn">
                                <a href="{{route('manager.settings.edit')}}" type="button"
                                    class="btn btn-block btn-warning">
                                    <i class="icon-pencil3 mr-2"></i>Edit</a>
                            </div>
                        </h4>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row images">
                                    <div class="col-lg-4 mb-2">
                                        <label for="">Logo Image</label>
                                        <div class="img_box" style="padding: 30px;">
                                            <img src="{{asset($settings->logo_image)}}" alt="" class="book_image">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <label for="">Logo Footer Image</label>
                                        <div class="img_box" style="padding: 30px;">
                                            <img src="{{asset($settings->logo_footer_image)}}" alt=""
                                                class="book_image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.layouts.includes.mini_text', ['field_name'=>'phone',
                    'field_value'=>$settings->phone,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'shipping_percent',
                    'field_value'=>$settings->shipping_percent,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'address', 'col'=>6,
                    'field_value'=>$settings->address,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'email', 'col'=>6,
                    'field_value'=>$settings->email,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'facebook', 'col'=>6,
                    'field_value'=>$settings->facebook,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'twitter', 'col'=>6,
                    'field_value'=>$settings->twitter,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'google_plus', 'col'=>6,
                    'field_value'=>$settings->google_plus,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'youtube', 'col'=>6,
                    'field_value'=>$settings->youtube,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'instagram', 'col'=>6,
                    'field_value'=>$settings->instagram,
                    'color'=>$colors[rand(0,count($colors)-1)]])

                    <div class="col-lg-12">
                        <div class="row">
                            @include('admin.layouts.includes.lang_tab',['color'=>$colors[rand(0,count($colors)-1)],'colors'=>$colors,'field_name'=>'copy_heading','field_value'=>$copy_heading])

                            @include('admin.layouts.includes.lang_tab',['color'=>$colors[rand(0,count($colors)-1)],'colors'=>$colors,'field_name'=>'copy_text','field_value'=>$copy_text])

                            @include('admin.layouts.includes.lang_tab',['color'=>$colors[rand(0,count($colors)-1)],'colors'=>$colors,'field_name'=>'location_title','field_value'=>$location_title])

                            @include('admin.layouts.includes.lang_tab',['color'=>$colors[rand(0,count($colors)-1)],'colors'=>$colors,'field_name'=>'location_desc','field_value'=>$location_desc])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection