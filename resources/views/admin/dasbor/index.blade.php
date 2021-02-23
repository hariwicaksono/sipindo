
 <!-- Info boxes -->           
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-newspaper"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Artikel</span>
        <span class="info-box-number">
          <?php 
          $data1 = DB::table('artikel')->where('jenis_artikel','Artikel')->get(); 
          echo $data1->count();
          ?>
          <small>Sudah dibuat</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
   <!-- fix for small devices only -->
   <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">
          Layanan
        </span>
        <span class="info-box-number">
        <?php 
          $data2 = DB::table('layanan')->where('jenis_layanan','Layanan')->get(); 
          echo $data2->count();
          ?>
          <small>Sudah Dipublikasikan</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">
         Team
        </span>
        <span class="info-box-number">
        <?php 
          $staff = DB::table('staff')->get(); 
          echo $staff->count();
          ?>
          <small>Orang</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-youtube"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Video Youtube</span>
        <span class="info-box-number">
        <?php 
          $video = DB::table('video')->get(); 
          echo $video->count();
          ?>
          <small>Video</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div> 

<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Blog</span>
        <span class="info-box-number">
          <?php 
          $data1 = DB::table('blog')->where('jenis_blog','Blog')->get(); 
          echo $data1->count();
          ?>
          <small>Sudah dibuat</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
   <!-- fix for small devices only -->
   <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-image"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">
          Galeri
        </span>
        <span class="info-box-number">
        <?php 
          $data2 = DB::table('galeri')->get(); 
          echo $data2->count();
          ?>
          <small>Sudah Dipublikasikan</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-comments"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">
         Testimoni
        </span>
        <span class="info-box-number">
        <?php 
          $staff = DB::table('testimonial')->get(); 
          echo $staff->count();
          ?>
          <small>Orang</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-light elevation-1"><i class="fas fa-question"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">FAQ</span>
        <span class="info-box-number">
        <?php 
          $faq = DB::table('faq')->get(); 
          echo $faq->count();
          ?>
          <small>FAQ</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div> 
<!--
<div class="row">
  <div class="col-md-6">

 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Artikel terbaru</h3>
              </div>
         
              <div class="card-body">
              <ul class="products-list product-list-in-card">
              <?php foreach($artikel as $artikel) { ?>
                <li class="item">
               <div class="product-img">
                  <img src="{{ asset('uploads/image/artikel/thumbs/'.$artikel->gambar) }}" class="card-img-top" alt="">
              </div>
                <div class="product-info">
                     <h6 class="mb-2"><a href="{{ asset('artikel/read/'.$artikel->slug_artikel) }}"><?php  echo $artikel->judul_artikel ?></a></h6>
                     <ul class="list-inline ">
                        <li class="list-inline-item" > <a class="text-muted" href="{{ asset('artikel/read/'.$artikel->slug_artikel) }}"><i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_id',$artikel->tanggal_post)}}</a> </li>
                         <li class="list-inline-item"> <a class="text-muted" href="{{ asset('artikel/kategori/'.$artikel->slug_artikel) }}"><i class="fas fa-sitemap"></i> {{ $artikel->nama_kategori }}</a> </li>
                     </ul>
                </div>
              </li>
              <?php } ?>
              </ul>
              </div>
         
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Lihat Semua</a>
              </div>
            
            </div>
    
</div>
<div class="col-md-6">

</div>

</div>-->
<!-- /.row -->
<script type="text/javascript">
    $(document).ready(function() {
  $("#menuDasbor .nav-link").addClass('active');
    }); 
  </script>