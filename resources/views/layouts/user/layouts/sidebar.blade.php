<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand mt-3" href="index.html">
        <span class="mr-2 d-none d-lg-inline">{{ Auth::user()->name }}</span>
    </a>

    <!-- Nav Item -to get the style of nav item-->
    <li class="nav-item">

        <!-- Heading -->
        <div class="sidebar-heading">
            <a class="nav-link" href="#">
                <i class="fas fa-user mr-2"></i>
                Profile
            </a>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            <a class="nav-link" href="#">
                <i class="fas fa-cogs mr-2"></i>
                Settings
            </a>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            <a class="nav-link" href="{{ url('user/wishlist') }}">
                <i class="fa-solid fa-heart mr-2"></i>
                Wishlist
            </a>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            <a class="nav-link" href="{{ url('user/cart') }}">
                <i class="fa-sharp fa-solid fa-cart-plus mr-2"></i>
                Cart
            </a>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            <a class="nav-link" href="{{ url('user/purchases') }}">
                <i class="fa-sharp fa-solid fa-list"></i>
                Purchases history
            </a>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
