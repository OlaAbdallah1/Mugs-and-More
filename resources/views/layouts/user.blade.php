
@include('layouts.admin.layouts.head')

<body id="page-top">

  @include('layouts.user.layouts.navbar')
  <div style="height: 6em"></div>
   <div class="container-fluid">
    <!-- Main content -->
    <section class="content">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@include('layouts.user.layouts.scripts')