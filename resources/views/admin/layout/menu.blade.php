<style type="text/css" media="screen">
  .nav ul li p !important {
    font-size: 12px;
  }
  .infoku {
    margin-left: 20px; 
    text-transform: uppercase;
    color: yellow;
    font-size: 11px;
  }
</style>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dasbor') }}" class="brand-link">
      <img src="{{ asset('uploads/image/'.website('icon')) }}"
         alt="{{ website('namaweb') }}"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
      <span class="brand-text font-weight-normal">{{ website('nama_singkat') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- DASHBOARD -->
          <li class="nav-header">KHUSUS {{ website('namaweb') }}</li>
          <li class="nav-item" id="menuDasbor">
            <a href="{{ url('admin/dasbor') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         

          <li class="nav-item" id="mainSipindo">
            <a href="#" class="nav-link" id="SipindoNav">
              <i class="nav-icon fas fa-store"></i>
              <p>Profil {{ website('namaweb') }} <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li id="ProfilSip" class="nav-item"><a href="{{ url('admin/konfigurasi/profil') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Profil</p></a>
              </li>
              <li id="LayananSip" class="nav-item"><a href="{{ url('admin/layanan') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Layanan</p></a>
              </li>
              <li id="FaqSip" class="nav-item"><a href="{{ url('admin/faq') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>FAQ</p></a>
              </li>
              <li id="DataStaff" class="nav-item"><a href="{{ url('admin/staff') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Team</p></a>
              </li>
              <li id="KategoriStaff" class="nav-item"><a href="{{ url('admin/kategori_staff') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Kategori Team</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item" id="mainSmartseeds">
            <a href="#" class="nav-link" id="SmartseedsNav">
              <i class="nav-icon fas fa-store"></i>
              <p>SMARTseeds Dashboard <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li id="ProfilSm" class="nav-item"><a href="{{ url('admin/smartseeds') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Profil</p></a>
              </li>
              <li id="KontenSm" class="nav-item"><a href="{{ url('admin/smartseeds/konten') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Konten</p></a>
              </li>
             
            </ul>
          </li>

          <!-- Website Content -->
          <li class="nav-header">ARTIKEL &amp; BLOG</li>

          <li class="nav-item" id="menuArtikel">
            <a href="{{ url('admin/artikel') }}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Artikel
              </p>
            </a>
          </li>

          <li class="nav-item" id="mainBlog">
            <a href="{{ url('admin/blog') }}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Blog</p>
            </a>
            
          </li>

          <!-- Website Content -->
          <li class="nav-header">DATA LAIN</li>

          <li class="nav-item" id="menuTestimonial">
            <a href="{{ url('admin/testimonial') }}" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>Testimonial</p>
            </a>
          </li>

          <li class="nav-item" id="mainGaleriNav">
            <a href="#" class="nav-link" id="GaleriNav">
              <i class="nav-icon fas fa-image"></i>
              <p>Galeri &amp; Banner<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li id="DataGaleri" class="nav-item"><a href="{{ asset('admin/galeri') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Galeri</p></a>
              </li>
              <li id="KategoriGaleri" class="nav-item"><a href="{{ asset('admin/kategori_galeri') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Kategori Galeri</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item" id="menuVideo">
            <a href="{{ url('admin/video') }}" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>Video</p>
            </a>
          </li>

          <!-- Website Content -->
          <li class="nav-header">PENGATURAN</li>
          <li class="nav-item" id="menuUser">
            <a href="{{ url('admin/user') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Pengguna</p>
            </a>
          </li>

          <li class="nav-item" id="menuHeader">
            <a href="{{ url('admin/header') }}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Header Halaman</p>
            </a>
          </li>

          <li class="nav-item" id="menuFont">
          <a href="{{ url('admin/font') }}" class="nav-link">
            <i class="nav-icon fas fa-font"></i>
            <p>Font</p>
          </a>
          </li>
          
          <!-- MENU -->
          <li class="nav-item" id="mainKonfigurasiNav">
            <a href="#" class="nav-link" id="KonfigurasiNav">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Konfigurasi
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li id="konfigurasiUmum" class="nav-item"><a href="{{ url('admin/konfigurasi') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Website</p></a>
              </li>
            
              <li id="KonfigurasiLogo" class="nav-item"><a href="{{ url('admin/konfigurasi/logo') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Logo</p></a>
              </li>
              <li id="KonfigurasiIcon" class="nav-item"><a href="{{ url('admin/konfigurasi/icon') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Icon</p></a>
              </li>
              
              <li id="KonfigurasiEmail" class="nav-item"><a href="{{ url('admin/konfigurasi/email') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Email</p></a>
              </li>
            </ul>
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
      <div class="row mb-0 mt-2">
          <div class="col-sm-6">
            <h1><?=$title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">{{ $breadcrumb ?? '' }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card ">
            <!-- /.card-header -->
            <div class="card-body">
    
