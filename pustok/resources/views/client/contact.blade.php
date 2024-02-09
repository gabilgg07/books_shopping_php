@extends("client.layouts.master")

@section("content")
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">{{__('menu.home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('menu.contact')}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Cart Page Start -->
<main class="contact_area inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="google-map"></div>
            </div>
        </div>
        <div class="row mt--60 ">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="contact_adress">
                    <div class="ct_address">
                        <h3 class="ct_title">{{$settings->location_title}}</h3>
                        <p>{{$settings->location_desc}}</p>
                    </div>
                    <div class="address_wrapper">
                        <div class="address">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>{{__('word.address')}}:</span> {!!$settings->address!!}</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>{{__('word.email')}}: </span>{{$settings->email}}</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>{{__('word.phone')}}:</span> {{$settings->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12 mt--30 mt-md--0">
                <div class="contact_form">
                    <h3 class="ct_title">{{__('word.send_us')}}</h3>
                    <form id="contact-form" action="php/mail.php" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{__('word.name')}} <span class="required">*</span></label>
                                    <input type="text" id="con_name" name="con_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{__('word.email')}} <span class="required">*</span></label>
                                    <input type="email" id="con_email" name="con_email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{__('word.phone')}}*</label>
                                    <input type="text" id="con_phone" name="con_phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{__('word.message')}}</label>
                                    <textarea id="con_message" name="con_message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-btn">
                                    <button type="submit" value="submit" id="submit" class="btn btn-black"
                                        name="submit">{{__('word.send')}}</button>
                                </div>
                                <div class="form__output"></div>
                            </div>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Cart Page End -->
@endsection

@push("scripts")
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2D8wrWMY3XZnuHO6C31uq90JiuaFzGws"></script>
@endpush