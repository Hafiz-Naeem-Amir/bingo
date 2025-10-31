<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Multiple Select (Select2) -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">

    <!-- AdminLTE Theme -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Daterange Picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="site\images\logo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Fullscreen Button -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <!-- Logout Button -->
                <li class="nav-item">
                    <form action="{{ route('user.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm ml-2">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar ">
    <!-- Brand Logo -->
    <div class="d-flex justify-content-center bg-gray">
        <a href="" class="brand-link">
            <img src="{{ asset('site/images/logo-white.png') }}" alt="AdminLTE Logo">
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar text-light">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item menu-open">
                    <a href="{{ url('admin/deshboard') }}"
                        class="nav-link {{ request()->is('admin/deshboard') ? 'active bg-primary text-white' : 'text-dark' }}">
                        <i class="nav-icon fas fa-tachometer-alt me-2"></i>
                        <p>Dashboard</p>
                    </a>

                    <ul class="nav nav-treeview ms-3">

                        <li class="nav-item">
                            <a href="{{ route('user.admin') }}"
                                class="nav-link {{ request()->routeIs('admin.home') ? 'active bg-primary text-white' : 'text-success' }}">
                                <i class="fas fa-home nav-icon me-2"></i>
                                <p>Home</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages') }}"
                                class="nav-link {{ request()->is('admin/content') ? 'active bg-primary text-white' : 'text-info' }}">
                                <i class="fas fa-file-alt nav-icon me-2"></i>
                                <p>Pages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.content') }}"
                                class="nav-link {{ request()->is('admin/content') ? 'active bg-primary text-white' : 'text-info' }}">
                                <i class="fas fa-file-alt nav-icon me-2"></i>
                                <p>Content</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.blog') }}"
                                class="nav-link {{ request()->routeIs('admin.category.show') ? 'active bg-primary text-white' : 'text-warning' }}">
                                <i class="fas fa-blog nav-icon me-2"></i>
                                <p>Blog</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.cetegories') }}"
                                class="nav-link {{ request()->routeIs('admin.product.show') ? 'active bg-primary text-white' : 'text-secondary' }}">
                                <i class="fas fa-envelope nav-icon me-2"></i>
                                <p>Cetegories</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.setting') }}"
                                class="nav-link {{ request()->routeIs('admin.product.show') ? 'active bg-primary text-white' : 'text-secondary' }}">
                                <i class="fas fa-cog nav-icon me-2"></i>
                                <p>Setting</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>

        <style>
            /* Change background color of selected tags */
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #0d6efd !important;
                /* Blue background */
                color: #fff !important;
                /* White text */
                border: none !important;
                border-radius: 4px !important;
                padding: 3px 20px !important;
                margin: 3px 4px !important;
                display: flex;
                /* Space between tags */
            }

            /* Remove border and style of the close “×” icon */
            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                color: #fff !important;
                border: none !important;
                /* Remove any border */
                background: transparent !important;
                /* No background */
                margin-right: 5px !important;
                font-weight: bold !important;
                cursor: pointer;
                /* margin:30px !important; */
            }

            /* Change hover color of selected tags */
            .select2-container--default .select2-selection--multiple .select2-selection__choice:hover {
                background-color: #0b5ed7 !important;
            }

            /* Optional: change dropdown highlight color */
            .select2-container--default .select2-results__option--highlighted[aria-selected] {
                background-color: #0d6efd !important;
                color: #fff !important;
            }
        </style>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer ">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
        <!-- jQuery -->
        <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- DataTables & Plugins -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
        <script>
            $('#content_description').summernote({
                height: 200
            });
        </script>
        <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

        <!-- jQuery UI -->
        <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- ChartJS -->
        <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>

        <!-- JQVMap -->
        <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>

        <!-- jQuery Knob Chart -->
        <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

        <!-- Daterangepicker -->
        <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Summernote -->
        <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

        <!-- OverlayScrollbars -->
        <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        <!-- AdminLTE -->
        <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"></aside>


</body>

</html>
