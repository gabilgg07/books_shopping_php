@extends("admin.layouts.master")
@push("theme_js")
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switch.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
@endpush
@section("content")
<div class="content">

    <!-- Form inputs -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Create New User</h5>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('manager.users.store')}}">
                @csrf
                <fieldset class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="first_name">
                        </div>
                        @error('first_name')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Last Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="last_name">
                        </div>
                        @error('last_name')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">E-mail</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email">
                        </div>
                        @error('email')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                        @error('password')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-check form-check-switchery form-check-inline form-check-right">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery-info" name="is_admin" data-fouc="">
                            Is Admin?
                        </label>
                    </div>
                    <div class="form-check form-check-switchery form-check-inline form-check-right">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery-danger" name="is_deleted"
                                data-fouc="">
                            Is Deleted?
                        </label>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form inputs -->

</div>
@endsection