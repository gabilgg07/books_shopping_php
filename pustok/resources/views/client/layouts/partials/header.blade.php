<div class="site-header header-4 mb--20 d-none d-lg-block">

    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="{{route('client.home.index')}}" class="site-brand">
                        <img src="{{asset('client/assets/image/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col-lg-5">
                    <div class="header-search-block">
                        <input type="text" placeholder="Search entire store here">
                        <button>Search</button>
                    </div>
                </div>
                <d iv class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            <div class="login-block">
                                @if (auth()->user() && !auth()->user()->is_admin)
                                <a href="{{route('client.account.index')}}"
                                    class="font-weight-bold">{{auth()->user()->first_name." ".auth()->user()->last_name}}</a>
                                <br>
                                <span>or</span><a onclick="return confirm('Are you sure?')"
                                    href="{{route('client.account.logout')}}">Logout</a>
                                @else
                                <a href="{{route('auth.signin')}}" class="font-weight-bold">Login</a> <br>
                                <span>or</span><a href="{{route('auth.signup')}}">Register</a>
                                @endif
                            </div>
                            <div class="cart-block">
                                <div class="cart-total">
                                    <span class="text-number">
                                        1
                                    </span>
                                    <span class="text-item">
                                        Shopping Cart
                                    </span>
                                    <span class="price">
                                        £0.00
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="cart-dropdown-block">
                                    <div class=" single-cart-block ">
                                        <div class="cart-product">
                                            <a href="{{route('client.shop.details')}}/1" class="image">
                                                <img src="{{asset('client/assets/image/products/cart-product-1.jpg')}}"
                                                    alt="">
                                            </a>
                                            <div class="content">
                                                <h3 class="title"><a href="{{route('client.shop.details')}}/1">Kodak
                                                        PIXPRO
                                                        Astro Zoom AZ421 16 MP</a>
                                                </h3>
                                                <p class="price"><span class="qty">1 ×</span> £87.34</p>
                                                <button class="cross-btn"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" single-cart-block ">
                                        <div class="btn-block">
                                            <a href="{{route('client.shop.card')}}" class="btn">View Cart <i
                                                    class="fas fa-chevron-right"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </d>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav primary-nav {{ request()->routeIs('client.home.index') ? 'show' : '' }}">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            @include("client.layouts.partials.categories")
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Free Support 24/7</p>
                            <p class="font-weight-bold number">+01-202-555-0181</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right li-last-0">
                            @include("client.layouts.partials.nav")
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>