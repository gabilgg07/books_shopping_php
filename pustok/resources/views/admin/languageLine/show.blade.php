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
                            <h4 class="font-weight-semibold mb-1 d-flex justify-content-between align-items-center">
                                <span class="text-default text-info">Details of
                                    {{$show_view_model['model']->id}} id Model
                                </span>
                                @if ($show_view_model['model']->is_deleted)
                                <span class="details_status text-danger is_deleted mr-5 border-3">
                                    Deleted !!!
                                </span>
                                @else
                                <span
                                    class="details_status text-{{$show_view_model['model']->is_active?'success is_active':'warning not_is_active'}} mr-5 border-3">
                                    {{$show_view_model['model']->is_active?"Active":"Don't Active"}}
                                </span>
                                @endif
                            </h4>

                            <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                                <blockquote class="blockquote d-flex mb-0">
                                    @if ($show_view_model['created_by_user']->image)
                                    <div class="mr-3">
                                        <img class="rounded-circle" src="{{$show_view_model['created_by_user']->image}}"
                                            width="46" height="46" alt="">
                                    </div>
                                    @endif

                                    <div>
                                        <p class="mb-1">This category created by
                                            <cite>{{$show_view_model['created_by_user']->first_name.' '.$show_view_model['created_by_user']->last_name}}</cite>
                                        </p>
                                        <footer class="blockquote-footer">Created At:
                                            <cite>{{$show_view_model['model']->created_at}}</cite>
                                        </footer>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                            <blockquote class="blockquote d-flex mb-0">
                                @if ($show_view_model['created_by_user']->image)
                                <div class="mr-3">
                                    <img class="rounded-circle" src="{{$show_view_model['created_by_user']->image}}"
                                        width="46" height="46" alt="">
                                </div>
                                @endif

                                <div>
                                    <p class="mb-1">This category created by
                                        <cite>{{$show_view_model['created_by_user']->first_name.' '.$show_view_model['created_by_user']->last_name}}</cite>
                                    </p>
                                    <footer class="blockquote-footer">Created At:
                                        <cite>{{$show_view_model['model']->created_at}}</cite>
                                    </footer>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-warning">
                            <div class="card-header bg-warning header-elements-inline">
                                <span class="card-title font-weight-semibold">Tests</span>
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
                                    $r_class = $show_view_model['colorClasses'][rand(0,
                                    count($show_view_model['colorClasses'])-1)];
                                    @endphp
                                    <li class="nav-item">
                                        <span
                                            class="nav-link text-{{$r_class}} {{array_key_last($show_view_model['slugs'])!=$lang?'border-bottom-1 border-bottom-dashed':''}}">
                                            {{$item}}
                                            <span
                                                class="font-size-sm font-weight-normal ml-auto text-{{$r_class}}-300">{{$lang}}</span>
                                        </span>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div
                                    class="card border-left-3 border-left-pink-400 border-right-3 border-right-pink-400 rounded-0">
                                    <div class="card-header">
                                        <h6 class="card-title">
                                            <span class="font-weight-semibold">Group</span>
                                        </h6>
                                    </div>

                                    <div class="card-body"><code>{{Str::upper($show_view_model['model']->group)}}</code>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div
                                    class="card border-left-3 border-left-teal-400 border-right-3 border-right-teal-400 rounded-0">
                                    <div class="card-header">
                                        <h6 class="card-title">
                                            <span class="font-weight-semibold">Key</span>
                                        </h6>
                                    </div>

                                    <div class="card-body">
                                        <code class="text-teal">{{Str::headline($show_view_model['model']->key)}}</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (array_key_exists('updated_by_user', $show_view_model))
                    <div class="col-lg-6">
                        <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                            <blockquote class="blockquote d-flex mb-0">
                                @if ($show_view_model['updated_by_user']->image)
                                <div class="mr-3">
                                    <img class="rounded-circle" src="{{$show_view_model['updated_by_user']->image}}"
                                        width="46" height="46" alt="">
                                </div>
                                @endif

                                <div>
                                    <p class="mb-1">This category last updated by
                                        <cite>{{$show_view_model['updated_by_user']->first_name.' '.$show_view_model['updated_by_user']->last_name}}</cite>
                                    </p>
                                    <footer class="blockquote-footer">Updated At:
                                        <cite>{{$show_view_model['model']->updated_at}}</cite>
                                    </footer>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    @endif
                    @if (array_key_exists('deleted_by_user', $show_view_model))
                    <div class="col-lg-6">
                        <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-info">
                            <blockquote class="blockquote d-flex mb-0">
                                @if ($show_view_model['deleted_by_user']->image)
                                <div class="mr-3">
                                    <img class="rounded-circle" src="{{$show_view_model['deleted_by_user']->image}}"
                                        width="46" height="46" alt="">
                                </div>
                                @endif

                                <div>
                                    <p class="mb-1">This category last deleted by
                                        <cite>{{$show_view_model['deleted_by_user']->first_name.' '.$show_view_model['deleted_by_user']->last_name}}</cite>
                                    </p>
                                    <footer class="blockquote-footer">Deleted At:
                                        <cite>{{$show_view_model['model']->deleted_at}}</cite>
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