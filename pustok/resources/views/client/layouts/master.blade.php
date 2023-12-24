<!DOCTYPE html>
<html lang="zxx">

<head>
    @include("client.layouts.partials.head")
</head>

<body>
    <div class="site-wrapper" id="top">
        <x-client-header-component />
        @include("client.layouts.partials.menu")
        @include("client.layouts.partials.sticky")
        @yield("content")
    </div>



    <!--=================================
    Footer
===================================== -->

    @include("client.layouts.partials.brands")
    @include("client.layouts.partials.footer")
    @include("client.layouts.partials.foot")
</body>

</html>