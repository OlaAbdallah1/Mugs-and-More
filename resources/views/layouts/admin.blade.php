
@include('layouts.admin.layouts.head')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  @include('layouts.admin.layouts.sidebar')

  @include('layouts.admin.layouts.navbar')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
{{-- @include('layouts.admin.layouts.footer') --}}

@include('layouts.admin.layouts.scripts')