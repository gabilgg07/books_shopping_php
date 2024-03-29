@php
$user = auth()->user();
@endphp

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="{{route('manager.account.index')}}"><img src="{{asset($user->image?$user->image:'admin/global_assets\images\user_default_photo.png')}}" style="width: 38px; height: 38px; object-fit:cover" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{$user->first_name.' '.$user->last_name}}</div>
                        <div class="font-size-xs opacity-50">
                            <!-- <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA -->
                            Super Admin
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="{{route('manager.account.index')}}" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('manager.dashboard')}}" class="nav-link {{ request()->routeIs('manager.dashboard') ? 'active' : '' }}">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu {{ request()->routeIs(['*.language_line.*','*.langs.*']) ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs(['*.language_line.*','*.langs.*']) ? 'active' : '' }}"><i class="icon-table2"></i> <span>Language Tables</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts" {{ request()->routeIs(['*.language_line.*','*.langs.*']) ? 'style=display:block;' : 'style=display:none;' }}">
                        <li class="nav-item"><a href="{{route('manager.langs.index')}}" class="nav-link {{ request()->routeIs('manager.langs.*') ? 'active' : '' }}">Langs</a>
                        </li>
                        <li class="nav-item"><a href="{{route('manager.language_line.index')}}" class="nav-link {{ request()->routeIs('manager.language_line.*') ? 'active' : '' }}">Language
                                Line</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu {{ request()->routeIs(['*.categories.*','*.users.*','*.campaigns.*','*.books.*']) ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs(['*.categories.*','*.users.*','*.campaigns.*','*.books.*']) ? 'active' : '' }}"><i class="icon-table2"></i> <span>Models Tables</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts" {{ request()->routeIs(['*.categories.*','*.users.*','*.campaigns.*','*.books.*']) ? 'style=display:block;' : 'style=display:none;' }}">
                        <li class="nav-item"><a href="{{route('manager.categories.index')}}" class="nav-link {{ request()->routeIs('manager.categories.*') ? 'active' : '' }}">Categories</a>
                        </li>
                        <li class="nav-item"><a href="{{route('manager.users.index')}}" class="nav-link {{ request()->routeIs('manager.users.*') ? 'active' : '' }}">Users</a>
                        </li>
                        <li class="nav-item"><a href="{{route('manager.campaigns.index')}}" class="nav-link {{ request()->routeIs('manager.campaigns.*') ? 'active' : '' }}">Campaings</a>
                        </li>
                        <li class="nav-item"><a href="{{route('manager.books.index')}}" class="nav-link {{ request()->routeIs('manager.books.*') ? 'active' : '' }}">Books</a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item nav-item-submenu {{ request()->routeIs(['*.sliders.*','*.brands.*']) ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs(['*.sliders.*','*.brands.*']) ? 'active' : '' }}"><i class="icon-table2"></i> <span>Additional Tables</span>
                        @if (count($pendingOrders))
                        <span class="badge bg-orange-400 align-self-center ml-auto text-dark">{{count($pendingOrders)}}</span>
                        @endif
                    </a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts" {{ request()->routeIs(['*.sliders.*','*.brands.*']) ? 'style=display:block;' : 'style=display:none;' }}">
                        <li class="nav-item"><a href="{{route('manager.sliders.index')}}" class="nav-link {{ request()->routeIs('manager.sliders.*') ? 'active' : '' }}">Hero
                                Sliders</a>
                        </li>
                        <li class="nav-item"><a href="{{route('manager.brands.index')}}" class="nav-link {{ request()->routeIs('manager.brands.*') ? 'active' : '' }}">Brands</a>
                        </li>
                        <li class="nav-item"><a href="{{route('manager.orders.index')}}" class="nav-link {{ request()->routeIs('manager.orders.*') ? 'active' : '' }}">Orders
                                @if (count($pendingOrders))
                                <span class="badge bg-orange-400 align-self-center ml-auto text-dark">{{count($pendingOrders)}}</span>
                                @endif
                            </a>
                        </li>
                        <!-- <li class="nav-item"><a href="{{route('manager.books.index')}}"
                                class="nav-link {{ request()->routeIs('manager.books.*') ? 'active' : '' }}">Books</a>
                        </li> -->
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('manager.settings.index')}}" class="nav-link {{ request()->routeIs('manager.settings.index') ? 'active' : '' }}">
                        <i class="icon-gear"></i>
                        <span>
                            Settings
                        </span>
                    </a>
                </li>
                <!-- /main -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>