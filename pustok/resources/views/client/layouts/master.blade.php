<!DOCTYPE html>
<html lang="zxx">

<head>
    @include("client.layouts.includes.head")
</head>

<body>
    <div class="site-wrapper" id="top">
        @include("client.layouts.includes.header")
        @include("client.layouts.includes.menu")
        @include("client.layouts.includes.sticky")
        @yield("content")
    </div>



    <!--=================================
    Footer
===================================== -->

    @include("client.layouts.includes.brands")
    @include("client.layouts.includes.footer")
    @include("client.layouts.includes.scripts")
</body>

</html>