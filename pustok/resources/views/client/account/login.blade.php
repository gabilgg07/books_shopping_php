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
                <form action="./">
                    <div class="login-form">
                        <h4 class="login-title">Returning Customer</h4>
                        <p><span class="font-weight-bold">I am a returning customer</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Enter your email address here...</label>
                                <input class="mb-0 form-control" type="email" id="email1"
                                    placeholder="Enter you email address here...">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" id="login-password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="col-md-12">
                                <a href="#" class="btn btn-outlined">Login</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection