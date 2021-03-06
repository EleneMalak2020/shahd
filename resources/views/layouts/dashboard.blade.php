<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Be Up | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  {{-- <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}"> --}}
  <!-- Tempusdominus Bbootstrap 4 -->

  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{ asset('/admin/dist/css/custom.css') }}">

    <!-- toaster link css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @include('dashboard.inc.nav')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.home') }}" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Be UP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('dashboard.home') }}" class="d-block">Home</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard.categories.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ??????????????
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.products.index') }}" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                ????????????????
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.users.index') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                ????????????????????
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                ??????????????
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.orders.waiting') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>?????? ????????????????</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.orders.in_progress') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>?????? ??????????????</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.orders.finished') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>????????????</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.orders.canceld') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>??????????</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.info') }}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                ?????????????? ????????????
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.aria.index') }}" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                ???????? ??????????????
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.end.index') }}" class="nav-link">
              <i class="nav-icon fa fa-heart"></i>
              <p>
                ?????????? ??????????
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.end.reports') }}" class="nav-link">
              <i class="nav-icon fa fa-heart"></i>
              <p>
                ????????????????
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.admins.index') }}" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                ????????????
              </p>
            </a>
          </li>

          <li class="nav-header">????????????????</li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  {{ __('?????????? ????????') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @yield('content')
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- For AJAX -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

@yield('scripts')
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!--toaster js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    })

</script>

<script>
    setInterval(function(){
        $('#countNotification').load(window.location.href +  " #countNotification")
        $('#refreshNotification').load(window.location.href + " #refreshNotification")
    }, 5000);
</script>




@toastr_render

</html>
