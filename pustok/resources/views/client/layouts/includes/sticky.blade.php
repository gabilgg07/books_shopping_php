<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="{{route('client.home.index')}}" class="site-brand">
                    <img src="{{asset('client/assets/image/logo.png')}}" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        @include("client.layouts.includes.nav")
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>