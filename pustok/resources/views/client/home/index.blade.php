@php
$hero_sliders = $home_index_vm['hero_sliders'];
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
@include("client.home.includes.galery")
<!--=================================
        Home Two Column Section
    ===================================== -->
<section class=" section-margin">
    <!-- <h1 class="sr-only">Promotion Section</h1> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include("client.home.includes.bestseller")
            </div>
            <div class="col-lg-8">
                @include("client.home.includes.tab")
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
@include("client.layouts.includes.details_modal")
@endsection