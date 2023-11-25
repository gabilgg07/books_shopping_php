<li class="menu-item {{ request()->routeIs('client.home.index') ? 'active' : '' }}">
    <a href="{{route('client.home.index')}}">Home </a>

</li>
<!-- Shop -->
<!-- <li class="menu-item {{ request()->routeIs('client.shop.index') || request()->routeIs('client.shop.details') ? 'active' : '' }}"> -->
<li class="menu-item {{ request()->routeIs('client.shop.*') ? 'active' : '' }}">
    <a href="{{route('client.shop.index')}}">Shop </a>

</li>


<li class="menu-item {{ request()->routeIs('client.contact') ? 'active' : '' }}">
    <a href="{{route('client.contact')}}">Contact</a>
</li>