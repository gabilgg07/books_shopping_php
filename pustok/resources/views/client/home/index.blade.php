@php
$hero_sliders = $home_index_vm['hero_sliders'];
$galery_categoriers = $home_index_vm['galery_categoriers'];
$best_seller = $home_index_vm['best_seller'];
$featureds = $home_index_vm['featureds'];
$new_arrivals = $home_index_vm['new_arrivals'];
$most_view_books = $home_index_vm['most_view_books'];
@endphp

@extends("client.layouts.master")

@section("content")
<!--=================================
        Hero Area
    ===================================== -->
@include("client.home.includes.hero", ['hero_sliders'=>$hero_sliders])
<!--=================================
        Home Features Section
    ===================================== -->

<!--=================================
        Home Category Gallery
    ===================================== -->
@include("client.home.includes.galery", ['categories'=>$galery_categoriers])
<!--=================================
        Home Two Column Section
    ===================================== -->
<section class=" section-margin">
    <!-- <h1 class="sr-only">Promotion Section</h1> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include("client.home.includes.bestseller", compact('best_seller'))
            </div>
            <div class="col-lg-8">
                @include("client.home.includes.tab", compact('featureds','new_arrivals','most_view_books'))
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.detail_modal').on('click', function(e) {
        e.preventDefault();
        const modalUrl = $(this).data('url');
        $('.product-details-slider').slick('unslick');
        $('.product-slider-nav').slick('unslick');

        $.get(modalUrl, function(data, status) {

            if (status !== 'success') {
                console.error('Error fetching book details:', data.message);
                return;
            }

            $('#quickModal .modal-dialog').html(data);
            $('.product-details-slider').slick({
                slidesToShow: 1,
                arrows: false,
                fade: true,
                swipe: true,
                asNavFor: ".product-slider-nav"
            });

            $('.product-slider-nav').slick({
                infinite: true,
                autoplay: true,
                autoplaySpeed: 8000,
                slidesToShow: 4,
                arrows: true,
                prevArrow: '<button class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                asNavFor: ".product-details-slider",
                focusOnSelect: true
            });

            $('#quickModal').show();
        });
    });
});
</script>
@endpush