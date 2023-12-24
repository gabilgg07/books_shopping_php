@php
$model_name = $show_view_model['model_name'];
$model = $show_view_model['model'];
$created_by_user = $show_view_model['created_by_user'];
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
                            <span class="details_status text-{{$model->is_active?'success is_active':'warning not_is_active'}} mr-5 border-3">
                                {{$model->is_active?"Active":"Don't Active"}}
                            </span>
                            @endif
                        </h4>
                    </div>

                    @include('admin.layouts.includes.show_user',['action_name'=>'created','model_name'=>$model_name,'user'=>$created_by_user,
                    'date'=>$model->created_at, 'color'=> $color_classes[rand(0,count($color_classes)-1)]])

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border-warning">
                                    <div class="card-header bg-warning header-elements-inline">
                                        <span class="card-title font-weight-semibold">Texts</span>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body p-0">
                                        <div class="nav nav-sidebar my-2">
                                            @foreach ($show_view_model['texts'] as $lang=>$item)
                                            @php
                                            $r_class = $show_view_model['color_classes'][rand(0,
                                            count($show_view_model['color_classes'])-1)];
                                            @endphp
                                            <li class="nav-item">
                                                <span class="nav-link text-{{$r_class}} {{array_key_last($show_view_model['texts'])!=$lang?'border-bottom-1 border-bottom-dashed':''}}">
                                                    {{$item}}
                                                    <span class="font-size-sm font-weight-normal ml-auto text-{{$r_class}}-300">{{$lang}}</span>
                                                </span>
                                            </li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            @include('admin.layouts.includes.mini_text',['field_name'=>'group','field_value'=>$model->group,
                            'color'=> $color_classes[rand(0,count($color_classes)-1)],
                            'upper'=>true])

                            @include('admin.layouts.includes.mini_text',['field_name'=>'key','field_value'=>$model->key,
                            'color'=> $color_classes[rand(0,count($color_classes)-1)],
                            'upper'=>false])
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
@endsection