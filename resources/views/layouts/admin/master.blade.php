<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.header')

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  
  @include('layouts.admin.navbar')

  <!-- Main Sidebar Container -->
  
  @include('layouts.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  @include('layouts.admin.footer')

</body>
</html>