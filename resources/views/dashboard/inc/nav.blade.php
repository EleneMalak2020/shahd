  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <div id="countNotification" >
                <span class="badge badge-warning navbar-badge">{{ $admin->unreadNotifications->count() }}</span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
            <div id="refreshNotification">
                @foreach($admin->unreadNotifications as $notification)
                        <i class="fas fa-file mr-2"></i>{{ $notification->data['title'] }} {{ $notification->data['user'] }}
                        <span class="float-right text-muted text-sm">{{ $notification->created_at }}</span>
                @endforeach
            </div>
          <div class="dropdown-divider"></div>
          <a href="{{ route('dashboard.MarkAsRead_all') }}" class="dropdown-item dropdown-footer">شاهد الطلبات</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
