<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar fixed-top navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#codebrainery-toggle-nav" aria-expanded="false">
            </button>

            <a class="navbar-brand" href="#">
                <img src="{{ asset('user/assets/img/Mugs.png') }}" alt="" width="30" height="24"
                    class="d-inline-block align-text-top">
                Mugs & More
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Topbar content -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="navbar-nav">
                            <a class="nav-link1 active" aria-current="page" href="{{ url('user/home') }}"><i
                                    class="fa-sharp fa-solid fa-house mr-2"></i>Home</a>

                            <a class="nav-link" href="{{ url('user/wishlist') }}">
                                <i class="fa-solid fa-heart mr-2"></i>
                                Wishlist
                            </a>
                            <a class="nav-link" href="{{ url('user/cart') }}">
                                <i class="fa-sharp fa-solid fa-cart-plus mr-2"></i>
                                Cart
                            </a>

                        </div>
                    <li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-sharp fa-solid fa-phone mr-2"></i>Contact Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" target="_blank"
                                    href="https://www.instagram.com/mugs.and.more_/"  style="color: #67595E" > <i
                                        class="fa fa-instagram mr-2"></i>Mugs & More </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" target="_blank"
                                    href="https://api.whatsapp.com/message/HF7GLG33BBW5E1?autoload=1&app_absent=0"  style="color: #67595E" ><i
                                        class="fa-brands fa-whatsapp mr-2"></i> WhatsApp</a></li>
                        </ul>
                    </li>
                    <!-- Topbar Search -->
                    <li class="nav-item mt-3">
                        <form action={{ url('user/search') }} method="GET" role="search" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="search" class="form-control bg-light border-0 small"
                                    placeholder="Search for products ..." name="search" value="">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </li>
                    
                   
                    
                    <!-- Nav Item - User Information -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-sharp fa-solid fa-user mr-2"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"  href="{{ url('/user/purchase') }}"><i class="fa-sharp fa-solid fa-list"></i> Purchases</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                           
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i
                                        class="fa-solid fa-right-from-bracket"></i>
                                    {{ __('Logout') }} </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>


                        </ul>
                    </li>





                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>

                        <div class="topbar-divider d-none d-sm-block"></div>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- End of Topbar -->
