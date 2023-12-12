@extends('admin.layouts.master')
@php
$user = auth()->user();
@endphp

@section('content')

<div class="content">

    <!-- Inner container -->
    <div class="d-flex align-items-start flex-column flex-md-row">

        <!-- Left content -->
        <div class="tab-content w-100 overflow-auto order-2 order-md-1">
            <div class="tab-pane fade active show" id="settings">

                <!-- Profile info -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Profile information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <!-- <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a> -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First name</label>
                                        <input type="text" value="{{$user->first_name}}" class="form-control"
                                            name="first_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last name</label>
                                        <input type="text" value="{{$user->last_name}}" class="form-control"
                                            name="last_name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="text" readonly="readonly" value="{{$user->email}}"
                                            class="form-control" name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input type="text" value="{{$user->phone?$user->phone:''}}"
                                            class="form-control">
                                        <span class="form-text text-muted">Ex. +994-99-999-99-99</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Upload profile image</label>
                                        <div class="uniform-uploader hover"><input type="file" class="form-input-styled"
                                                data-fouc=""><span class="filename" style="user-select: none;">No file
                                                selected</span><span class="action btn bg-warning"
                                                style="user-select: none;">Choose File</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /profile info -->


                <!-- Account settings -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Account settings</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <!-- <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a> -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" value="{{$user->email}}" readonly="readonly"
                                            class="form-control" name="email">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Current password</label>
                                        <input type="password" value="password" readonly="readonly"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>New password</label>
                                        <input type="password" placeholder="Enter new password" class="form-control"
                                            name="new_password">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Repeat password</label>
                                        <input type="password" placeholder="Repeat new password" class="form-control"
                                            name="repeat_new_password">
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /account settings -->

            </div>
        </div>
        <!-- /left content -->


        <!-- Right sidebar component -->
        <div
            class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User card -->
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle"
                                src="{{asset('admin/global_assets\images\demo\users\face0.jpg')}}" width="170"
                                height="170" alt="">
                            <div class="card-img-actions-overlay card-img rounded-circle">
                                <a href="#"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                    <i class="icon-plus3"></i>
                                </a>
                                <a href="user_pages_profile.html"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                    <i class="icon-link"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="font-weight-semibold mb-0">{{$user->first_name.' '.$user->last_name}}</h6>
                        <span class="d-block text-muted">Super Admin</span>

                        <!-- <div class="list-icons list-icons-extended mt-3">
                            <a href="#" class="list-icons-item" data-popup="tooltip" title="Google Drive"
                                data-container="body"><i class="icon-google-drive"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" title="Twitter"
                                data-container="body"><i class="icon-twitter"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" title="Github"
                                data-container="body"><i class="icon-github"></i></a>
                        </div> -->
                    </div>
                </div>
                <!-- /user card -->
            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /right sidebar component -->

    </div>
    <!-- /inner container -->

</div>
@endsection