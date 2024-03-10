<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">
            CarVehicle
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('admin_assets/images/logo-mini.svg')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">

        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('adminPanel')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Home</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            @foreach($tables as $tabela)

                <a class="nav-link" href="{{ route("$tabela".".index")}}">
        <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
        </span>
                    <span class="menu-title">{{ ucwords(str_replace('_',' ',$tabela)) }}</span>
                </a>
            @endforeach

        </li>

    </ul>
</nav>
