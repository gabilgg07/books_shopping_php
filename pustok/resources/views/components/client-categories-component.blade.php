<ul class="category-menu">
    @foreach ($models as $key=>$item)
    @if ($key<7) <li class="cat-item {{count($item['children'])?'has-children':''}}">
        <a href="{{route('client.shop.index', $item['model']->slug)}}">{{$item['model']->title}}</a>
        @if (count($item['children']))
        <ul class="sub-menu">
            @foreach ($item['children'] as $child)
            <li><a href="{{route('client.shop.index', $child->slug)}}">{{$child->title}}</a></li>
            @endforeach
        </ul>
        @endif
        </li>
        @else
        <li class="cat-item hidden-menu-item {{count($item['children'])?'has-children':''}}">
            <a href="{{route('client.shop.index', $item['model']->slug)}}">{{$item['model']->title}}</a>
            @if (count($item['children']))
            <ul class="sub-menu">
                @foreach ($item['children'] as $child)
                <li><a href="{{route('client.shop.index', $child->slug)}}">{{$child->title}}</a></li>
                @endforeach
            </ul>
            @endif
        </li>
        @endif
        @endforeach

        @if (count($models)>8)
        <li class="cat-item more_categories">
            <a href="#" class="js-expand-hidden-menu">
                {{Str::headline(__('categories.more'))}}
            </a>
        </li>
        @endif
</ul>


@push('scripts')
<script>
$(".js-expand-hidden-menu").on("click", function(e) {
    e.preventDefault();
    $(".hidden-menu-item").toggle(500);
    var window_width = $(window).width();
    if (window_width <= 1200) {
        $(".hidden-lg-menu-item").toggle(500);
    }
    var htmlAfter = "{{Str::headline(__('categories.close'))}}";
    var htmlBefore = "{{Str::headline(__('categories.more'))}}";

    $(this).html(
        $(this).text() == htmlAfter ? htmlBefore : htmlAfter
    );
    $(this).toggleClass("menu-close");
});
</script>
@endpush