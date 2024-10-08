<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PRIME PROPERTY</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- third party css -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <link href="{{ URL::asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/css/vendor/jquery-jvectormap-1.2.2.css' ) }}" rel="stylesheet" type="text/css"> 
    <link href="{{ URL::asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/css/icons.min.css' ) }}" rel="stylesheet" type="text/css"> 
    <link href="{{ URL::asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/css/app.min.css' ) }}" rel="stylesheet" type="text/css"> 
        
      
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
                        @include('layout.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                            @include('layout.navbar')
                    <!-- end Topbar --> 
                    
                    <!-- Start Content-->
                        @yield('content')
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Necolo Tekiko Laravel Project
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar="">

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1">

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1">
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1">
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor.min.js')}}" ></script>
        <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/app.min.js')}}" ></script>
        <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/apexcharts.min.js')}}" ></script>
        <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}" ></script>
        <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}" ></script>
        <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/pages/demo.dashboard.js')}}" ></script>


         <!-- bundle -->
         <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/jquery.dataTables.min.js')}}" ></script>
         <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/dataTables.bootstrap5.js')}}" ></script>
         <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/dataTables.responsive.min.js')}}" ></script>
         <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/dataTables.checkboxes.min.js')}}" ></script>
         <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/vendor/responsive.bootstrap5.min.js')}}" ></script>
         <script src="{{asset('public/dmin_dashbaord_v18_html_css_js_bootstap5-main/assets/js/pages/demo.products.js')}}" ></script>

                <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- DataTables Extensions CSS -->
        <link href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" rel="stylesheet">
        <!-- DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!-- DataTables Extensions JavaScript -->
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

        <script>
    $(document).ready(function() {
        $('#propertyTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'csv', 'print'
            ]
        });
    });
</script>


            
     
      
    </body>
</html>