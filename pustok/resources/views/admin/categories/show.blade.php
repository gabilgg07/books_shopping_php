@extends('admin.layouts.master')
@section('content')
<div class="content">
    <!-- Inner container -->
    <div class="d-flex align-items-start flex-column flex-md-row">

        <!-- Left content -->
        <div class="w-100 overflow-auto order-2 order-md-1">

            <!-- Post -->
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            @if ($category_show_model['category']->image)
                            <div class="mb-3 text-center">
                                <span class="d-inline-block">
                                    <img src="{{$category_show_model['category']->image}}" class="img-fluid" alt="">
                                </span>
                            </div>
                            @endif

                            <h4 class="font-weight-semibold mb-1 d-flex justify-content-between align-items-center">
                                <span class="text-default text-info">Details of
                                    {{$category_show_model['category']->id}} id Category
                                </span>
                                @if ($category_show_model['category']->is_deleted)
                                <span class="details_status text-danger is_deleted mr-5 border-3">
                                    Deleted !!!
                                </span>
                                @else
                                <span class="details_status text-{{$category_show_model['category']->is_active?'success is_active':'warning not_is_active'}} mr-5 border-3">
                                    {{$category_show_model['category']->is_active?"Active":"Don't Active"}}
                                </span>
                                @endif
                            </h4>

                            <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                                <blockquote class="blockquote d-flex mb-0">
                                    @if ($category_show_model['created_by_user']->image)
                                    <div class="mr-3">
                                        <img class="rounded-circle" src="{{$category_show_model['created_by_user']->image}}" width="46" height="46" alt="">
                                    </div>
                                    @endif

                                    <div>
                                        <p class="mb-1">This category created by
                                            <cite>{{$category_show_model['created_by_user']->first_name.' '.$category_show_model['created_by_user']->last_name}}</cite>
                                        </p>
                                        <footer class="blockquote-footer">Created At:
                                            <cite>{{$category_show_model['category']->created_at}}</cite>
                                        </footer>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-warning">
                            <div class="card-header bg-warning header-elements-inline">
                                <span class="card-title font-weight-semibold">Titles</span>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="nav nav-sidebar my-2">
                                    @foreach ($category_show_model['titles'] as $lang=>$title)
                                    @php
                                    $r_class = $category_show_model['colorClasses'][rand(0,
                                    count($category_show_model['colorClasses'])-1)];
                                    @endphp
                                    <li class="nav-item">
                                        <span class="nav-link text-{{$r_class}} {{array_key_last($category_show_model['slugs'])!=$lang?'border-bottom-1 border-bottom-dashed':''}}">
                                            {{$title}}
                                            <span class="font-size-sm font-weight-normal ml-auto text-{{$r_class}}-300">{{$lang}}</span>
                                        </span>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card border-secondary">
                            <div class="card-header bg-secondary header-elements-inline">
                                <span class="card-title font-weight-semibold">Slugs</span>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="nav nav-sidebar my-2">
                                    @foreach ($category_show_model['slugs'] as $lang=>$slug)
                                    @php
                                    $r_class = $category_show_model['colorClasses'][rand(0,
                                    count($category_show_model['colorClasses'])-1)];
                                    @endphp
                                    <li class="nav-item">
                                        <span class="nav-link text-{{$r_class}} {{array_key_last($category_show_model['slugs'])!=$lang?'border-bottom-1 border-bottom-dashed':''}}">
                                            {{$slug}}
                                            <span class="font-size-sm font-weight-normal ml-auto text-{{$r_class}}-300">{{$lang}}</span>
                                        </span>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (array_key_exists('parent_category', $category_show_model))
                    <div class="col-lg-7">
                        <div class="card border-left-blue border-right-blue rounded-0">
                            <div class="card-header">
                                <h6 class="card-title"><span class="font-weight-semibold">Child</span> of</h6>
                            </div>
                            <div class="card-body">
                                <h3 class="text-blue">{{$category_show_model['parent_category']->title}}
                                    <span class="font-size-sm font-weight-normal text-default">category</span>
                                </h3>

                            </div>
                        </div>
                    </div>
                    @endif

                    @if (array_key_exists('updated_by_user', $category_show_model))
                    <div class="col-lg-6">
                        <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                            <blockquote class="blockquote d-flex mb-0">
                                @if ($category_show_model['updated_by_user']->image)
                                <div class="mr-3">
                                    <img class="rounded-circle" src="{{$category_show_model['updated_by_user']->image}}" width="46" height="46" alt="">
                                </div>
                                @endif

                                <div>
                                    <p class="mb-1">This category last updated by
                                        <cite>{{$category_show_model['updated_by_user']->first_name.' '.$category_show_model['updated_by_user']->last_name}}</cite>
                                    </p>
                                    <footer class="blockquote-footer">Updated At:
                                        <cite>{{$category_show_model['category']->updated_at}}</cite>
                                    </footer>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    @endif
                    @if (array_key_exists('deleted_by_user', $category_show_model))
                    <div class="col-lg-6">
                        <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                            <blockquote class="blockquote d-flex mb-0">
                                @if ($category_show_model['deleted_by_user']->image)
                                <div class="mr-3">
                                    <img class="rounded-circle" src="{{$category_show_model['deleted_by_user']->image}}" width="46" height="46" alt="">
                                </div>
                                @endif

                                <div>
                                    <p class="mb-1">This category last deleted by
                                        <cite>{{$category_show_model['deleted_by_user']->first_name.' '.$category_show_model['deleted_by_user']->last_name}}</cite>
                                    </p>
                                    <footer class="blockquote-footer">Deleted At:
                                        <cite>{{$category_show_model['category']->deleted_at}}</cite>
                                    </footer>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- /post -->

        </div>
        <!-- /left content -->

    </div>
    <!-- /inner container -->

</div>
@endsection