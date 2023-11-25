<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.layouts.partials.head")
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <x-admin-header-component />

        <!-- Content Wrapper. Contains page content -->
        @yield("content")
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <x-admin-footer-component />
    </div>
    <!-- ./wrapper -->

    @include("admin.layouts.partials.foot")
</body>

</html>