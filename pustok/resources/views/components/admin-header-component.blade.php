@php
$crumbs = Str::of(Str::after(Route::currentRouteName(),'manager.'))->explode('.');
$breadcrumbs = [];
foreach($crumbs as $key=>$crumb){
$breadcrumbs[] = $key===0? $crumb.'.index':$crumbs[$key-1].'.'.$crumb;
}
@endphp
<div class="page-header page-header-light">
    <!-- <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{route('manager.dashboard')}}"><i class="icon-arrow-left52 mr-2"></a></i> <span
                    class="font-weight-semibold">Home</span> -
                Dashboard</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-link btn-float text-default"><i
                        class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i>
                    <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i>
                    <span>Schedule</span></a>
            </div>
        </div>
    </div> -->

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{route('manager.dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    Home</a>
                @foreach ($breadcrumbs as $key=>$breadcrumb)
                @if ($key!==count($breadcrumbs)-1)
                <a href="{{route("manager.$breadcrumb")}}" class="breadcrumb-item">
                    {{Str::headline($crumbs[$key])}}
                </a>
                @else
                <span class="breadcrumb-item active">
                    {{Str::headline($crumbs[$key])}}
                </span>
                @endif
                @endforeach
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <!-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>

                <div class="breadcrumb-elements-item dropdown p-0">
                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear mr-2"></i>
                        Settings
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account
                            security</a>
                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                        <a href="#" class="dropdown-item"><i class="icon-accessibility"></i>
                            Accessibility</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>