<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <a class="navbar-brand" href="#">
                <img src="{{ asset('admin/assets/img/Mugs.png') }}" alt="" width="30" height="24"
                    class="d-inline-block align-text-top">
                Mugs & More
            </a>
              
            <!-- Topbar content -->
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{ url('user/home') }}">Home</a>
                        <a class="nav-link" href="#">Contact Us</a>
                    </div>
                <li>

              <!-- Topbar Search -->
                <li>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
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

        </nav>
        <!-- End of Topbar -->
