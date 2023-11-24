@extends("client.layouts.master")

@section("content")

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{route('auth.login')}}" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Sign In</h4>
                        @csrf
                        <div class="row">
                            @if (session()->has('error'))
                            <div class="col-md-12 col-12">
                                <div class="alert alert-danger m-0">
                                    {{ session('error') }}
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" type="email" id="email" name="email" placeholder="Enter you email address here...">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="col-6 mb--20">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" name="remember" id="remember" style="height: auto;">
                                    <label class="m-0 ml-2" for="remember">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 mb--20">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{route('auth.signup')}}" class="form-link font-weight-light font-italic">I
                                        have not account</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-outlined">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection