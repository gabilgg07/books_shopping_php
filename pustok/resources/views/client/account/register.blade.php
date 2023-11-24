@extends("client.layouts.master")

@section("content")

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Register</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                <!-- Login Form s-->
                <form method="post" action="{{route('auth.register')}}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Sign Up</h4>
                        <p><span class="font-weight-bold">Registration</span></p>
                        <div class="row">
                            <!-- @if ($errors->any())
                            <div class="col-lg-12 mb--20">
                                <strong>Validation Errors:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif -->
                            <div class="col-lg-6 mb--10">
                                <label for="first_name">First Name</label>
                                <input class="mb-0 form-control" type="text" id="first_name" name="first_name" placeholder="Enter your first name">
                                @error('first_name')
                                <div style="font-size: 12px; padding: 5px;" class="alert alert-danger m-0 mt-1" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb--10">
                                <label for="last_name">Last Name</label>
                                <input class="mb-0 form-control" type="text" id="last_name" name="last_name" placeholder="Enter your last name">
                                @error('last_name')
                                <div style="font-size: 12px; padding: 5px;" class="alert alert-danger m-0 mt-1" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 mb--10">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" type="email" id="email" name="email" placeholder="Enter Your Email Address Here..">

                                @error('email')
                                <div style="font-size: 12px; padding: 5px;" class="alert alert-danger m-0 mt-1" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb--10">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                @error('password')
                                <div style="font-size: 12px; padding: 5px;" class="alert alert-danger m-0 mt-1" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb--10">
                                <label for="repeat_password">Repeat Password</label>
                                <input class="mb-0 form-control" type="password" id="repeat_password" name="repeat_password" placeholder="Repeat your password">
                                @error('repeat_password')
                                <div style="font-size: 12px; padding: 5px;" class="alert alert-danger m-0 mt-1" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 mb--10">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{route('auth.signin')}}" class="form-link font-weight-light font-italic">I
                                        have account</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-outlined">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection