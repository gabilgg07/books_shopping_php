@extends('admin.layouts.master')
@php
$user = auth()->user();
@endphp
@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\user_pages_profile.js')}}"></script>
<script>
$(window).on('load', function() {
    $("#profile_image_input").change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#profile_image").attr(
            "src",
            URL.createObjectURL(event.target.files[0])
        );
    });
});
</script>
@endpush
@section('content')

<div class="content">

    <!-- Inner container -->
    <div class="d-flex align-items-start flex-column flex-md-row">

        <!-- Left content -->
        <div class="tab-content w-100 overflow-auto order-2 order-md-1">
            <div class="tab-pane fade active show" id="settings">

                <!-- Profile info -->
                <div class="card">

                    @if (session('message'))
                    <div class="alert alert-{{session('type')}} border-0 alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        {{session('message')}}
                    </div>
                    @endif
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
                        <form method="post" action="{{route('manager.account.update',['id' =>$user->id])}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First name</label>
                                        <input type="text" value="{{old('first_name', $user->first_name)}}"
                                            class="form-control" name="first_name">
                                        @error('first_name')
                                        <label class="validation-invalid-label">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last name</label>
                                        <input type="text" value="{{old('last_name', $user->last_name)}}"
                                            class="form-control" name="last_name">
                                        @error('last_name')
                                        <label class="validation-invalid-label">{{$message}}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="text" readonly="readonly" value="{{old('email', $user->email)}}"
                                            class="form-control">
                                        @error('email')
                                        <label class="validation-invalid-label">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input type="text" value="{{old('phone',$user->phone?$user->phone:'')}}"
                                            class="form-control" name="phone">
                                        @error('phone')
                                        <label class="validation-invalid-label">{{$message}}</label>
                                        @enderror
                                        <span class="form-text text-muted">Ex. +994123456789</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Upload profile image</label>
                                        <input type="file" class="form-input-styled" data-fouc="" name="image"
                                            id="profile_image_input">
                                        @error('image')
                                        <label class="validation-invalid-label">{{$message}}</label>
                                        @enderror
                                        <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg. Max
                                            file
                                            size 2Mb</span>
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
                        <h5 class="card-title">Change Password</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <!-- <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a> -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('manager.account.changePassword')}}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>New password</label>
                                        <input type="password" placeholder="Enter new password" class="form-control"
                                            name="new_password" value="{{old('new_password')}}">
                                        @error('new_password')
                                        <label class="validation-invalid-label">{{$message}}</label>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Repeat password</label>
                                        <input type="password" placeholder="Repeat new password" class="form-control"
                                            name="repeat_new_password" value="{{old('repeat_new_password')}}">
                                        @error('repeat_new_password')
                                        <label class="validation-invalid-label">{{$message}}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Change</button>
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
                            <img class="rounded-circle"
                                src="{{asset($user->image?$user->image:'admin/global_assets\images\user_default_photo.png')}}"
                                style="object-fit: cover; width:180px; height:180px" alt="" id="profile_image">
                            <!-- <div class="card-img-actions-overlay card-img rounded-circle">
                                <a href="#"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                    <i class="icon-plus3"></i>
                                </a>
                                <a href="user_pages_profile.html"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                    <i class="icon-link"></i>
                                </a>
                            </div> -->
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