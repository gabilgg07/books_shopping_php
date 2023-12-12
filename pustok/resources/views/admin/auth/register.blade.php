<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="assets/image/x-icon" href="{{asset('admin/global_assets/admin_favicon.png')}}">
    <title>Pustok Admin Registration</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{asset('admin/global_assets\css\icons\icomoon\styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets\css\bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets\css\layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets\css\components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets\css\colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('admin/global_assets\js\main\jquery.min.js')}}"></script>
    <script src="{{asset('admin/global_assets\js\main\bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/global_assets\js\plugins\loaders\blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>

    <script src="{{asset('admin/assets\js\app.js')}}"></script>
    <script src="{{asset('admin/global_assets\js\demo_pages\login.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Registration form -->
                <form class="login-form" method="post" action="{{route('manager.signup')}}">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i
                                    class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Create account</h5>
                                <span class="d-block text-muted">All fields are required</span>
                            </div>

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">Your credentials</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="email" class="form-control" placeholder="E-mail" name="email">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                                @error('email')
                                <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>
                                    {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" placeholder="First name" name="first_name">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                                @error('first_name')
                                <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>
                                    {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" placeholder="Last name" name="last_name">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                                @error('last_name')
                                <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>
                                    {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                                @error('password')
                                <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>
                                    {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" placeholder="Repeat Password"
                                    name="repeat_password">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                                @error('repeat_password')
                                <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>
                                    {{$message}}</span>
                                @enderror
                            </div>


                            <div class="text-center mb-2">
                                <a href="{{route('manager.login')}}">I have account</a>
                            </div>
                            <button type="submit" class="btn bg-teal-400 btn-block">Register <i
                                    class="icon-circle-right2 ml-2"></i></button>
                        </div>
                    </div>
                </form>
                <!-- /registration form -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>