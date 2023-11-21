<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Book Store HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('client/assets/styles/plugins.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('client/assets/styles/main.css')}}" />
    <link rel="shortcut icon" type="{{asset('client/assets/image/x-icon')}}"
        href="{{asset('client/assets/image/favicon.ico')}}">
</head>

<body>
    <div class="site-wrapper" id="top">
        @include("client.layouts.includes.header")
        @include("client.layouts.includes.menu")
        @include("client.layouts.includes.sticky")
    </div>

    @yield("content")


    <!--=================================
    Footer
===================================== -->

    @include("client.layouts.includes.brands")
    @include("client.layouts.includes.footer")
    @include("client.layouts.includes.scripts")
</body>

</html>