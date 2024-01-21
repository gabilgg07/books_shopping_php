@php
$model_name = $show_view_model['model_name'];
$model = $show_view_model['model'];
$images = $show_view_model['images'];
$created_by_user = $show_view_model['created_by_user'];
$color_classes = $show_view_model['color_classes'];
$category = $show_view_model['category'];
$campaign = $show_view_model['campaign'];
@endphp

@extends('admin.layouts.master')

@push("page_title")
{{Str::headline($model_name)}} Details
@endpush

@section('content')
<div class="content">
    <div class="d-flex align-items-start flex-column flex-md-row">
        <div class="w-100 overflow-auto order-2 order-md-1">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12">

                        <h4 class="font-weight-semibold mb-1 d-flex justify-content-between align-items-center">
                            <span class="text-default text-info">Details of
                                {{$model->id}} id {{Str::headline($model_name)}}
                            </span>
                            @if ($model->is_deleted)
                            <span class="details_status text-danger is_deleted mr-5 border-3">
                                Deleted !!!
                            </span>
                            @else
                            <span
                                class="details_status text-{{$model->is_active?'success is_active':'warning not_is_active'}} mr-5 border-3">
                                {{$model->is_active?"Active":"Don't Active"}}
                            </span>
                            @endif
                        </h4>
                    </div>

                    @include('admin.layouts.includes.show_user',['action_name'=>'created','model_name'=>$model_name,'user'=>$created_by_user,
                    'date'=>$model->created_at, 'color'=> $color_classes[rand(0,count($color_classes)-1)]])


                    <div class="col-lg-12">
                        <div class="row">
                            @include('admin.layouts.includes.lang_tab',['color'=>$color_classes[rand(0,count($color_classes)-1)],'colors'=>$color_classes,'field_name'=>'titles','field_value'=>$show_view_model['titles']])

                            @include('admin.layouts.includes.lang_tab',['color'=>$color_classes[rand(0,count($color_classes)-1)],'colors'=>$color_classes,'field_name'=>'slugs','field_value'=>$show_view_model['slugs']])

                            @include('admin.layouts.includes.lang_tab',['color'=>$color_classes[rand(0,count($color_classes)-1)],'colors'=>$color_classes,'field_name'=>'short_descs','field_value'=>$show_view_model['short_descs']])

                            @include('admin.layouts.includes.lang_tab',['color'=>$color_classes[rand(0,count($color_classes)-1)],'colors'=>$color_classes,'field_name'=>'long_descs','field_value'=>$show_view_model['long_descs']])
                        </div>
                    </div>
                    @include('admin.layouts.includes.mini_text', ['field_name'=>'price',
                    'field_value'=>number_format($model->price, 2, '.', ''),
                    'color'=>$color_classes[rand(0,count($color_classes)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'count',
                    'field_value'=>$model->count,
                    'color'=>$color_classes[rand(0,count($color_classes)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'views',
                    'field_value'=>$model->views,
                    'color'=>$color_classes[rand(0,count($color_classes)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'reviews',
                    'field_value'=>number_format($model->reviews, 2, '.', ''),
                    'color'=>$color_classes[rand(0,count($color_classes)-1)]])

                    @include('admin.layouts.includes.mini_text', ['field_name'=>'author', 'col'=>6,
                    'field_value'=>$model->author,
                    'color'=>$color_classes[rand(0,count($color_classes)-1)]])

                    @if ($category)
                    @include('admin.layouts.includes.mini_text', ['field_name'=>'category', 'col'=>6,
                    'field_value'=>$category->title,
                    'color'=>$color_classes[rand(0,count($color_classes)-1)]])
                    @endif

                    @if ($campaign)
                    @include('admin.layouts.includes.mini_text', ['field_name'=>'campaign', 'col'=>6,
                    'field_value'=>$campaign->title,
                    'color'=>$color_classes[rand(0,count($color_classes)-1)]])
                    @endif

                    @if (array_key_exists('updated_by_user', $show_view_model))

                    @include('admin.layouts.includes.show_user',['action_name'=>'updated','model_name'=>$model_name,'user'=>$show_view_model['updated_by_user'],
                    'date'=>$model->updated_at, 'color'=> $color_classes[rand(0,count($color_classes)-1)]])

                    @endif

                    @if (array_key_exists('deleted_by_user', $show_view_model))

                    @include('admin.layouts.includes.show_user',['action_name'=>'deleted','model_name'=>$model_name,'user'=>$show_view_model['deleted_by_user'],
                    'date'=>$model->deleted_at, 'color'=> $color_classes[rand(0,count($color_classes)-1)]])

                    @endif


                    @if (count($images))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row images">
                                @foreach ($images as $image)
                                <div class="col-lg-4 mb-2">
                                    <div class="img_box {{$image->is_main? 'main_img':''}}">
                                        <img src="{{$image->image}}" alt="" class="book_image">
                                        @if ($image->is_main)
                                        <span class="main_icon">Main</span>
                                        @endif

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection