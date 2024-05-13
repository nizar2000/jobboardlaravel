
@include('layouts.header')

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
      
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('layouts.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content" id="content">
        @include('layouts.navbar')
            <!-- Navbar End -->


            <!-- Widgets End -->


            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- Footer End -->

</body>

</html>