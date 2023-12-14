<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head')
</head>

<body>

    <!-- Main navbar -->
    @include("admin.layouts.partials.main_navbar")
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include("admin.layouts.partials.main_sidebar")
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <x-admin-header-component />
            <!-- /page header -->


            <!-- Content area -->
            @yield("content")
            <!-- /content area -->


            <!-- Footer -->
            <x-admin-footer-component />
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>