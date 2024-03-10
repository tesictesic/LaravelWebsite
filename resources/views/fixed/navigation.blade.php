<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

        <div class="container">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('home')}}">carvilla<span></span></a>

            </div><!--/.navbar-header-->
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('cars')}}">Cars</a></li>
                    @if(\Illuminate\Support\Facades\Session::has('user'))
                        @php
                            $user = \Illuminate\Support\Facades\Session::get('user');
                            if($user != null) {
                                $ima_auta = \Illuminate\Support\Facades\DB::table('users')
                                    ->join('orders', 'users.id', '=', 'orders.user_id')
                                    ->where('user_id', $user->id)
                                    ->where('status_id', '=', 1)
                                    ->get();
                            }
                        @endphp

                        @if(isset($ima_auta) && count($ima_auta) > 0)
                            <li><a href="{{ route('service') }}">Servicing</a></li>
                        @endif
                    @endif

                    <li><a href="{{route('contact')}}">contact</a></li>
                    <li><a href="{{route('author')}}">author</a></li>



                    @if(\Illuminate\Support\Facades\Session::has('user'))
                        @if(\Illuminate\Support\Facades\Session::get('user')->role_id==1)
                            <li><a href="{{route('adminPanel')}}">Admin Panel</a></li>
                        @endif
                        <li><a href="{{route('user',['id'=>\Illuminate\Support\Facades\Session::get('user')->id])}}">User</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    @else
                    <li><a href="{{route('login')}}">Login</a></li>
                    @endif
                </ul><!--/.nav -->
            </div><!-- /.navbar-collapse -->
        </div><!--/.container-->
    </nav>
