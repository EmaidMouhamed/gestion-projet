
<!doctype html>
<html lang="en" dir="ltr">

@include('admin.pages.head')

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

        <div class="page-wrapper toggled">
            <!-- sidebar-wrapper -->
            @include('admin.pages.sidebar')
            <!-- sidebar-wrapper  -->

            <!-- Start Page Content -->
            <main class="page-content bg-light">
                <!-- Top Header -->
                    @include('admin.pages.header')
                <!-- Top Header -->

                <div class="container-fluid">
                    <div class="layout-specing">
                        @yield('content')
                    </div>
                </div><!--end container-->

                <!-- Footer Start -->
                    @include('admin.pages.footer')
                <!--end footer-->
                <!-- End -->
            </main>
            <!--End page-content" -->
        </div>
        <!-- page-wrapper -->

        <!-- Offcanvas Start -->
        <!-- Offcanvas End -->
        
        <!-- JAVASCRIPT -->
            @include('admin.pages.js')
        <!-- JAVASCRIPT -->
    </body>

</html>