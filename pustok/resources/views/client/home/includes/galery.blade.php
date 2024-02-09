<section class="mt-4 section-margin">
    <div class="container">
        <div class="category-gallery-block">
            <a href="{{route('client.shop.index', ['slug'=>$categories['single']->slug])}}" class="single-block hr-large">
                <img src="{{asset($categories['single']->image)}}" alt="{{$categories['single']->slug}}">
            </a>
            <div class=" single-block inner-block-wrapper">
                @foreach ($categories['galery'] as $key=>$category)
                <a href="{{route('client.shop.index', ['slug'=>$category->slug])}}" class="single-image {{$key===0||$key===3?'mid':'small' }}-image">
                    <img src="{{asset($category->image)}}" alt="{{$category->slug}}">
                </a>
                @endforeach
                <!-- <a href=" #" class="single-image small-image">
                    <img src="{{asset('client/assets/image/others/cat-gal-small.png')}}" alt="">
                </a>
                <a href=" #" class="single-image small-image">
                    <img src="{{asset('client/assets/image/others/cat-gal-small-2.jpg')}}" alt="">
                </a>
                <a href="#" class="single-image mid-image">
                    <img src="{{asset('client/assets/image/others/cat-gal-mid-2.png')}}" alt="">
                </a> -->
            </div>
        </div>
    </div>
</section>