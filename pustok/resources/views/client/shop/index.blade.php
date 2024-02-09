@php
if(count(request()->query())){
$queries ='';
foreach(request()->query() as $query=>$value){
$queries = $queries.$query.'='.$value;
}

}
@endphp
@extends('client.layouts.master')

@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.home.index') }}">{{__('menu.home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('menu.shop')}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="shop-toolbar mb--30">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <!-- Product View Mode -->
                    <div class="product-view-mode">
                        <a href="#" class="sorting-btn active" data-target="grid-four">
                            <span class="grid-four-icon">
                                <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6  mt--10 mt-sm--0">
                    @php
                    $to = 0;
                    if($books->total()>$books->perPage() && ($books->currentPage() !== $books->lastPage())){
                    $to = $books->currentPage()*$books->perPage();
                    }else{
                    $to = $books->total();
                    }
                    @endphp
                    <span class="toolbar-status">
                        {{__('word.showing',['from'=>($books->currentPage()-1)*$books->perPage()+1, 'to'=>$to,
                        'sum'=>$books->total(), 'pages'=>$books->lastPage()])}}
                    </span>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>{{__('word.sort')}}:</span>
                        <form action="{{ url()->current() }}" method="GET" id="sortForm">
                            @if (count(request()->query()))
                            @foreach (request()->query() as $query=>$value)
                            @if ($query !== 'sort_by')
                            <input type="hidden" name="{{$query}}" value="{{$value}}" />
                            @endif
                            @endforeach
                            @endif
                            <select class="form-control nice-select sort-select mr-0" name="sort_by"
                                onchange="submitForm()">
                                <option value="" selected="selected">{{__('word.default_sort')}}</option>
                                <option value="az">{{__('word.sort')}}: {{__('word.name')}} ({{__('word.a_z')}})
                                </option>
                                <option value="za">{{__('word.sort')}}: {{__('word.name')}} ({{__('word.z_a')}})
                                </option>
                                <option value="p_lh">{{__('word.sort')}}: {{__('word.price_lh')}}</option>
                                <option value="p_hl">{{__('word.sort')}}:{{__('word.price_hl')}}</option>
                                <option value="r_hl">{{__('word.sort')}}:{{__('word.rating_h')}}</option>
                                <option value="r_lh">{{__('word.sort')}}:{{__('word.rating_l')}}</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="shop-product-wrap grid-four with-pagination row space-db--30 shop-border">
            @foreach ($books as $book)
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                {{$book->author}}
                            </a>
                            <h3><a
                                    href="{{ route('client.shop.details', $book->id) }}">{{Str::limit($book->title,22)}}</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{ asset($book->mainImage()->image) }}" alt="{{$book->slug}} 1">
                                <div class="hover-contents">
                                    <a href="{{ route('client.shop.details', $book->id) }}" class="hover-image">
                                        @php
                                        $imgHover = $book->images()->first() !== null ?
                                        $book->images()->first()->image :
                                        $book->mainImage()->image;
                                        @endphp
                                        <img src="{{ asset($imgHover) }}" alt="{{$book->slug}} 2">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="{{route('client.cart.add', $book->id)}}" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal"
                                            data-url="{{route('client.shop.getDetails', $book->id)}}"
                                            class="single-btn detail_modal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                @if ($book->campaign)
                                <span
                                    class="price">{{__('symbol.currency')}}{{number_format($currPrice * ($book->price-($book->price*$book->campaign->discount_percent/100)), 2, '.', '')}}</span>
                                <del
                                    class="price-old">{{__('symbol.currency')}}{{number_format($currPrice * $book->price, 2, '.', '')}}</del>
                                <span class="price-discount">{{$book->campaign->discount_percent}}%</span>
                                @else
                                <span
                                    class="price">{{__('symbol.currency')}}{{number_format($currPrice * $book->price, 2, '.', '')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination Block -->

        {!! $books->withQueryString()->links('pagination::bootstrap-5') !!}
        <!-- Modal -->
        <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
            aria-labelledby="quickModal" aria-hidden="true">
            <div class="modal-dialog" role="document">

            </div>
        </div>
    </div>
</main>
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

function submitForm() {
    document.getElementById("sortForm").submit();
}
</script>
@endpush