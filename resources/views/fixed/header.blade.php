@include('fixed.head')
<section id="home" class="welcome-hero">

    <!-- top-area Start -->
    <div class="top-area">
        <div class="header-area">
            <!-- Start Navigation -->
            @include('fixed.navigation')
           <!--/nav-->
            <!-- End Navigation -->
        </div><!--/.header-area-->
        <div class="clearfix"></div>

    </div><!-- /.top-area-->
    <!-- top-area End -->

    <div class="container">
        <div class="welcome-hero-txt">
            <h2>get your desired car in resonable price</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore   magna aliqua.
            </p>
            <button class="welcome-btn" onclick="window.location.href='{{route('contact')}}'">contact us</button>
        </div>
    </div>
    @yield('filter')

</section>
