<body class="hold-transition sidebar-mini layout-fixed pace-warning text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-success navbar-dark py-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      @if (!\Request::is('admin/dasbor'))
      <li class="nav-item d-none d-sm-inline-block">
       
    
          <a href="{{ redirect()->back()->getTargetUrl() }}" class="nav-link">
              <i class="fas fa-arrow-left"></i>&ensp;Kembali
            </a>
            </li>
          @endif
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ asset('/') }}" target="_blank" class="nav-link"><i class="fa fa-globe"></i> Lihat Situs</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-lock"></i> <?php echo Session()->get('nama'); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header text-left">Akun</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          <?php echo Session()->get('nama'); ?> (<?php echo Session()->get('akses_level'); ?>)
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ asset('login/logout') }}">
          <i class="fas fa-sign-out-alt"></i> KELUAR
          </a>
         
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->