<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.components.header')

</head>

<body>
    <!--  Sidebar -->
    @include('layout.components.sidebar')
    <!-- End Sidebar-->

    <!-- main content -->
    <main id="main" class="main">
        <!-- topbar -->
        @include('layout.components.topbar')

        <!-- content area -->
        <section class="section contentContainer">
            @yield('content')
        </section>

        <!-- footer -->
        @include('layout.components.footer')

    </main>
    <!-- end main content -->

    <!-- loader -->
    <div id="loading"></div>

    <!-- Vendor JS Files -->

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>
</body>

</html>
