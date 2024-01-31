<li class="menu-item {{ request()->routeIs('client.home.index') ? 'active' : '' }}">
    <a href="{{route('client.home.index')}}">{{__('menu.home')}} </a>

</li>
<!-- Shop -->
<!-- <li class="menu-item {{ request()->routeIs('client.shop.index') || request()->routeIs('client.shop.details') ? 'active' : '' }}"> -->
<li class="menu-item {{ request()->routeIs('client.shop.*') ? 'active' : '' }}">
    <a href="{{route('client.shop.index')}}">{{__('menu.shop')}} </a>

</li>


<li class="menu-item {{ request()->routeIs('client.contact') ? 'active' : '' }}">
    <a href="{{route('client.contact')}}">{{__('menu.contact')}}</a>
</li>