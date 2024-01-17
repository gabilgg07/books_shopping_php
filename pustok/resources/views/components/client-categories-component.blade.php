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
        <li class="cat-item hidden-menu-item {{count($model['children'])?'has-children':''}}">
            <a href="{{route('client.shop.index', $model->slug)}}">{{$item['model']->title}}</a>
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
        <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                Categories</a></li>
        @endif
</ul>

<!-- <ul class="category-menu">
    <li class="cat-item has-children">
        <a href="#">Arts & Photography</a>
        <ul class="sub-menu">
            <li><a href="#">Bags & Cases</a></li>
            <li><a href="#">Binoculars & Scopes</a></li>
            <li><a href="#">Digital Cameras</a></li>
            <li><a href="#">Film Photography</a></li>
            <li><a href="#">Lighting & Studio</a></li>
        </ul>
    </li>
    <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
        <ul class="sub-menu">
            <li class="single-block">
                <h3 class="title">WHEEL SIMULATORS</h3>
                <ul>
                    <li><a href="#">Bags & Cases</a></li>
                    <li><a href="#">Binoculars & Scopes</a></li>
                    <li><a href="#">Digital Cameras</a></li>
                    <li><a href="#">Film Photography</a></li>
                    <li><a href="#">Lighting & Studio</a></li>
                </ul>
            </li>
            <li class="single-block">
                <h3 class="title">WHEEL SIMULATORS</h3>
                <ul>
                    <li><a href="#">Bags & Cases</a></li>
                    <li><a href="#">Binoculars & Scopes</a></li>
                    <li><a href="#">Digital Cameras</a></li>
                    <li><a href="#">Film Photography</a></li>
                    <li><a href="#">Lighting & Studio</a></li>
                </ul>
            </li>
            <li class="single-block">
                <h3 class="title">WHEEL SIMULATORS</h3>
                <ul>
                    <li><a href="#">Bags & Cases</a></li>
                    <li><a href="#">Binoculars & Scopes</a></li>
                    <li><a href="#">Digital Cameras</a></li>
                    <li><a href="#">Film Photography</a></li>
                    <li><a href="#">Lighting & Studio</a></li>
                </ul>
            </li>
            <li class="single-block">
                <h3 class="title">WHEEL SIMULATORS</h3>
                <ul>
                    <li><a href="#">Bags & Cases</a></li>
                    <li><a href="#">Binoculars & Scopes</a></li>
                    <li><a href="#">Digital Cameras</a></li>
                    <li><a href="#">Film Photography</a></li>
                    <li><a href="#">Lighting & Studio</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="cat-item has-children"><a href="#">Business & Money</a>
        <ul class="sub-menu">
            <li><a href="">Brake Tools</a></li>
            <li><a href="">Driveshafts</a></li>
            <li><a href="">Emergency Brake</a></li>
            <li><a href="">Spools</a></li>
        </ul>
    </li>
    <li class="cat-item has-children"><a href="#">Calendars</a>
        <ul class="sub-menu">
            <li><a href="">Brake Tools</a></li>
            <li><a href="">Driveshafts</a></li>
            <li><a href="">Emergency Brake</a></li>
            <li><a href="">Spools</a></li>
        </ul>
    </li>
    <li class="cat-item has-children"><a href="#">Children's Books</a>
        <ul class="sub-menu">
            <li><a href="">Brake Tools</a></li>
            <li><a href="">Driveshafts</a></li>
            <li><a href="">Emergency Brake</a></li>
            <li><a href="">Spools</a></li>
        </ul>
    </li>
    <li class="cat-item has-children"><a href="#">Comics</a>
        <ul class="sub-menu">
            <li><a href="">Brake Tools</a></li>
            <li><a href="">Driveshafts</a></li>
            <li><a href="">Emergency Brake</a></li>
            <li><a href="">Spools</a></li>
        </ul>
    </li>
    <li class="cat-item"><a href="#">Perfomance Filters</a></li>
    <li class="cat-item has-children"><a href="#">Cookbooks</a>
        <ul class="sub-menu">
            <li><a href="">Brake Tools</a></li>
            <li><a href="">Driveshafts</a></li>
            <li><a href="">Emergency Brake</a></li>
            <li><a href="">Spools</a></li>
        </ul>
    </li>
    <li class="cat-item hidden-menu-item"><a href="#">Accessories</a></li>
    <li class="cat-item hidden-menu-item"><a href="#">Education</a></li>
    <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
    <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
            Categories</a></li>
</ul> -->