@php
$model_name = $show_view_model['model_name'];
$model = $show_view_model['model'];
$color_classes = $show_view_model['color_classes'];
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
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

                        @if (array_key_exists('created_by_user', $show_view_model))

                        @include('admin.layouts.includes.show_user',['action_name'=>'created','model_name'=>$model_name,'user'=>$show_view_model['created_by_user'],
                        'date'=>$model->created_at, 'color'=> $color_classes[rand(0,count($color_classes)-1)]])

                        @endif

                        @if ($model->image)
                        <div class="col-lg-6">
                            <div class="card" style="width: 300px; height:300px">
                                <span class="card-body d-inline-block" style="overflow: hidden;">
                                    <img src="{{$model->image}}" class="img_user" alt="">
                                </span>
                            </div>
                        </div>
                        @endif

                        <div class="col-lg-12">
                            <div class="row">
                                @include('admin.layouts.includes.mini_text',['field_name'=>'first_name','field_value'=>$model->first_name,
                                'color'=> $color_classes[rand(0,count($color_classes)-1)],
                                'upper'=>false])

                                @include('admin.layouts.includes.mini_text',['field_name'=>'last_name','field_value'=>$model->last_name,
                                'color'=> $color_classes[rand(0,count($color_classes)-1)],
                                'upper'=>false])

                                @include('admin.layouts.includes.mini_text',['field_name'=>'email','field_value'=>$model->email,
                                'color'=> $color_classes[rand(0,count($color_classes)-1)],
                                'upper'=>false])


                                @include('admin.layouts.includes.mini_text',['field_name'=>'is_admin','field_value'=>$model->is_admin?'Yes':'No',
                                'color'=> $color_classes[rand(0,count($color_classes)-1)],
                                'upper'=>false])

                                @if ($model->phone)
                                @include('admin.layouts.includes.mini_text',['field_name'=>'phone','field_value'=>$model->phone,
                                'color'=> $color_classes[rand(0,count($color_classes)-1)],
                                'upper'=>false])
                                @endif
                            </div>
                        </div>

                        @if (array_key_exists('updated_by_user', $show_view_model))

                        @include('admin.layouts.includes.show_user',['action_name'=>'updated','model_name'=>$model_name,'user'=>$show_view_model['updated_by_user'],
                        'date'=>$model->updated_at, 'color'=> $color_classes[rand(0,count($color_classes)-1)]])

                        @endif

                        @if (array_key_exists('deleted_by_user', $show_view_model))

                        @include('admin.layouts.includes.show_user',['action_name'=>'deleted','model_name'=>$model_name,'user'=>$show_view_model['deleted_by_user'],
                        'date'=>$model->deleted_at, 'color'=> $color_classes[rand(0,count($color_classes)-1)]])

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection