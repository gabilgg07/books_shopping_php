@php
$count = 0;
@endphp

<div class="site-header header-4 mb--20 d-none d-lg-block">

    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="{{route('client.home.index')}}" class="site-brand">
                        <img src="{{asset($settings->logo_image)}}" alt="">
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="header-search-block">
                        <input type="text" placeholder="{{__('search.placeholder')}}">
                        <button>{{__('search.btn')}}</button>
                    </div>
                </div>
                <d iv class="col-lg-5">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            <div class="login-block">
                                @if ($user && !$user->is_admin)
                                <a href="{{route('client.account.index')}}"
                                    class="font-weight-bold">{{$user->first_name." ".$user->last_name}}</a>
                                <br>
                                <span>or</span><a href="{{route('client.account.logout')}}">{{__('word.logout')}}</a>
                                @else
                                <a href="{{route('auth.signin')}}" class="font-weight-bold">{{__('word.login')}}</a>
                                <br>
                                <span>{{__('word.or')}}</span><a
                                    href="{{route('auth.signup')}}">{{__('word.register')}}</a>
                                @endif
                            </div>
                            <div class="langs-block">
                                <p class="lang">
                                    @if ($currentLang->image)
                                    <img src="{{$currentLang->image}}" class="img-flag mr-2"
                                        alt="{{$currentLang->code.'-'.$currentLang->country}}">
                                    @endif
                                    {{ Str::upper($currentLang->code) }} <i class="ml-1 fas fa-angle-down "></i>
                                </p>
                                <ul class="langs">
                                    @foreach($langs as $lang)
                                    @if ($currentLang->code !== $lang->code)
                                    <li class="lang-item">
                                        <a rel="alternate" hreflang="{{ $lang->code }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($lang->code, null, [], true) }}">
                                            @if ($lang->image)
                                            <img src="{{$lang->image}}" class="img-flag mr-2"
                                                alt="{{$lang->code.'-'.$lang->country}}">
                                            @endif
                                            {{ Str::upper($lang->code) }}
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="cart-block">
                                <div class="cart-total">
                                    <span class="text-number">
                                        {{Cart::count()}}
                                    </span>
                                    <span class="text-item">
                                        {{__('card.title')}}
                                    </span>
                                    <span class="price">
                                        {{__('symbol.currency')}}{{number_format($currPrice*Cart::subtotal(), 2, '.','')}}
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="cart-dropdown-block">
                                    <div class=" single-cart-block ">
                                        @foreach (Cart::content() as $key=>$cart)

                                        @php
                                        $titles = (array)json_decode($cart->name);
                                        if($titles && count($titles)){
                                        $title = $titles[LaravelLocalization::getCurrentLocale()];
                                        }
                                        $count++;
                                        if($count>=4){
                                        break;
                                        }
                                        @endphp
                                        <div class="cart-product">
                                            <a href="{{route('client.shop.details',$cart->id)}}" class="image">
                                                <img src="{{asset($cart->options['image'])}}" alt="">
                                            </a>
                                            <div class="content">
                                                <h3 class="title"><a href="{{route('client.shop.details',$cart->id)}}">
                                                        {{$title ?? $cart->name}}</a>
                                                </h3>
                                                <p class="price"><span class="qty">{{$cart->qty}} ×</span>
                                                    {{__('symbol.currency')}}{{number_format($currPrice*$cart->price, 2, '.', '')}}
                                                </p>
                                                <a href="{{route('client.cart.remove',$cart->rowId)}}"
                                                    class="cross-btn"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class=" single-cart-block ">
                                        <div class="btn-block">
                                            <a href="{{route('client.cart')}}" class="btn">{{__('card.view')}}<i
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
                            <a href="javascript:void(0)" class="category-trigger"><i
                                    class="fa fa-bars"></i>{{__('categories.title')}}</a>
                            <x-client-categories-component />
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>{{__('free.support')}}</p>
                            <p class="font-weight-bold number">{{$settings->phone}}</p>
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