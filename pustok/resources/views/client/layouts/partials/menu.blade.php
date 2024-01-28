<div class="site-mobile-menu">
    <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
        <div class="container">
            <div class="row align-items-sm-end align-items-center">
                <div class="col-md-4 col-7">
                    <a href="{{route('client.home.index')}}" class="site-brand">
                        <img src="{{asset('client/assets/image/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col-md-5 order-3 order-md-2">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            @include("client.layouts.partials.categories")
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-5  order-md-3 text-right">
                    <div class="mobile-header-btns header-top-widget">
                        <ul class="header-links">
                            <li class="sin-link">
                                <a href="{{route('client.cart')}}" class="cart-link link-icon"><i class="ion-bag"></i></a>
                            </li>
                            <li class="sin-link">
                                <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i class="ion-navicon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Off Canvas Navigation Start-->
    <aside class="off-canvas-wrapper">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>
        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box offcanvas">
                <form>
                    <input type="text" placeholder="Search Here">
                    <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>
            <!-- search box end -->
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu main-mobile-menu">
                        @include("client.layouts.partials.nav")
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
            <nav class="off-canvas-nav">
                <ul class="mobile-menu menu-block-2">
                    <li class="menu-item-has-children">
                        <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li> <a href="cart.html">USD $</a></li>
                            <li> <a href="checkout.html">EUR €</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li>Eng</li>
                            <li>Ban</li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="">My Account</a></li>
                            <li><a href="">Order History</a></li>
                            <li><a href="">Transactions</a></li>
                            <li><a href="">Downloads</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="off-canvas-bottom">
                <div class="contact-list mb--10">
                    <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                    <a href="" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                </div>
                <div class="off-canvas-social">
                    <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </aside>
    <!--Off Canvas Navigation End-->
</div>