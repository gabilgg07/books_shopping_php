<!--=================================
    Footer Area
===================================== -->
<footer class="site-footer">
    <div class="container">
        <div class="row justify-content-between  section-padding">
            <div class=" col-xl-4 col-lg-4 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="brand-footer footer-title">
                        <a href="{{route('client.home.index')}}">
                            <img src="{{asset('client/assets/image/logo--footer.png')}}" alt="">
                        </a>
                    </div>
                    <div class=" footer-contact">
                        <p><span class="label">{{__('word.address')}}:</span><span
                                class="text">{!!$settings->address!!}</span></p>
                        <p><span class="label">{{__('word.phone')}}:</span><span
                                class="text">{{$settings->phone}}</span></p>
                        <p><span class="label">{{__('word.email')}}:</span><span
                                class="text">{{$settings->email}}</span></p>
                    </div>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>{{__('word.information')}}</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="{{route('client.home.index')}}">{{__('menu.home')}}</a></li>
                        <li><a href="{{route('client.shop.index')}}">{{__('menu.shop')}}</a></li>
                        <li><a href="{{route('client.contact')}}">{{__('menu.contact')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-4 col-sm-6">
                <div class="footer-title">
                    <h3>{{__('subscribe.title')}}</h3>
                </div>
                <div class="newsletter-form mb--30">
                    <form action="./php/mail.php">
                        <input type="email" class="form-control" placeholder="{{__('subscribe.placeholder')}}">
                        <button class="btn btn--primary w-100">{{__('subscribe.btn')}}</button>
                    </form>
                </div>
                <div class="social-block">
                    <h3 class="title">{{__('stay.connected')}}</h3>
                    <ul class="social-list list-inline">
                        <li class="single-social facebook"><a href="{{$settings->facebook}}"><i
                                    class="ion ion-social-facebook"></i></a>
                        </li>
                        <li class="single-social twitter"><a href="{{$settings->twitter}}"><i
                                    class="ion ion-social-twitter"></i></a></li>
                        <li class="single-social google"><a href="{{$settings->google_plus}}"><i
                                    class="ion ion-social-googleplus-outline"></i></a></li>
                        <li class="single-social youtube"><a href="{{$settings->youtube}}"><i
                                    class="ion ion-social-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="copyright-heading">{{$settings->copy_heading}}</p>
            <!-- <a href="#" class="payment-block">
                <img src="{{asset('client/assets/image/icon/payment.png')}}" alt="">
            </a> -->
            <p class=" copyright-text">{!!$settings->copy_text!!}
            </p>
        </div>
    </div>
</footer>