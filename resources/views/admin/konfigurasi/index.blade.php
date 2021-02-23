<style>
#imagePreview {
    width: 250px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian!</strong>
        <ul class="mt-2 mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
@endif
 
<form action="{{ asset('admin/konfigurasi/proses') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

<ul class="nav nav-pills nav-justified mb-3" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active py-2" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informasi Umum</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link py-2" id="hero-tab" data-toggle="tab" href="#hero" role="tab" aria-controls="hero" aria-selected="false">Homepage Hero</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link py-2" id="sosmed-tab" data-toggle="tab" href="#sosmed" role="tab" aria-controls="sosmed" aria-selected="false">Sosial Media Official</a>
  </li>

  <li class="nav-item" role="presentation">
    <a class="nav-link py-2" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">Modul SEO</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link py-2" id="maps-tab" data-toggle="tab" href="#maps" role="tab" aria-controls="maps" aria-selected="false">Peta Google Maps</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  
  <h5 class="mb-3">Informasi Umum</h5>

    <div class="form-group">
    <label>Nama</label>
    <input type="text" name="namaweb" placeholder="Nama Web" value="<?php echo $site->namaweb ?>" required class="form-control" readonly>
    </div>
    
    <div class="form-group">
    <label>Tagline</label>
    <input type="text" name="tagline" placeholder="Tagline/Motto" value="<?php echo $site->tagline ?>" class="form-control">
    </div>
    
    <div class="form-group">
      <label>Deskripsi Singkat (Untuk Meta Description, Footer)</label>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="deskripsiID-tab" data-toggle="tab" href="#deskripsiID" role="tab" aria-controls="deskripsiID" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="deskripsiEN-tab" data-toggle="tab" href="#deskripsiEN" role="tab" aria-controls="deskripsiEN" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="deskripsiID" role="tabpanel" aria-labelledby="deskripsiID-tab">
    <textarea name="deskripsi_singkat" rows="3" class="form-control textarea" placeholder="Deskripsi singkat"><?php echo $site->deskripsi_singkat ?></textarea>
    </div>
    <div class="tab-pane fade" id="deskripsiEN" role="tabpanel" aria-labelledby="deskripsiEN-tab">
    <textarea name="deskripsi_singkat_en" rows="3" class="form-control textarea" placeholder="Deskripsi singkat"><?php echo $site->deskripsi_singkat_en ?></textarea>
    </div>
    </div>
      
    </div>

    <div class="form-group">
    <label>Alamat Web</label>
    <input type="url" name="website" placeholder="{{ url('/') }}" value="<?php echo $site->website ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Email resmi</label>
    <input type="email" name="email" placeholder="emailutama@address.com" value="<?php echo $site->email ?>" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Email resmi 2</label>
    <input type="email" name="email_cadangan" placeholder="emailkedua@address.com" value="<?php echo $site->email_cadangan ?>" class="form-control" required>
    </div>
    
     <div class="form-group">
    <label>Alamat</label>
    <textarea name="alamat" rows="3" class="form-control textarea" placeholder="Alamat perusahaan/organisasi"><?php echo $site->alamat ?></textarea>
    </div>
    
     <div class="form-group">
    <label>No.Telepon</label>
    <input type="text" name="telepon" placeholder="021-123456789" value="<?php echo $site->telepon ?>" class="form-control">
    </div>
    
      <div class="form-group">
    <label>No.Fax</label>
    <input type="text" name="fax" placeholder="021-123456789" value="<?php echo $site->fax ?>" class="form-control">
    </div>
    
     <div class="form-group">
    <label>No.HP</label>
    <input type="text" name="hp" placeholder="021-123456789" value="<?php echo $site->hp ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Link GooglePlay</label>
    <input type="text" name="link_googleplay" placeholder="Link GooglePlay" value="<?php echo $site->link_googleplay ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Link AppStore</label>
    <input type="text" name="nama_appstore" placeholder="Link AppStore" value="<?php echo $site->link_appstore ?>" class="form-control">
    </div>
  
  </div> <!--home tab-->

  <div class="tab-pane fade" id="hero" role="tabpanel" aria-labelledby="hero-tab">
  <div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label>Ganti Background</label>
        <input type="file" name="gambar" class="form-control" id="file">
        <div id="imagePreview"></div>
    </div>
    </div>
    <div class="col-md-6">
        <label>Gambar saat ini</label><br>
        <img src="{{ asset('uploads/image/thumbs/'.$site->hero_bg) }}" style="max-width:200px; height:auto;">
    </div>
    </div>
  <div class="form-group">
    <label>Hero Title</label>
    <input type="text" name="hero_title" placeholder="" value="<?php echo $site->hero_title ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Hero Deskripsi</label>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="herotextID-tab" data-toggle="tab" href="#herotextID" role="tab" aria-controls="herotextID" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="herotextEN-tab" data-toggle="tab" href="#herotextEN" role="tab" aria-controls="herotextEN" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="herotextID" role="tabpanel" aria-labelledby="herotextID-tab">
    <input type="text" name="hero_text" placeholder="" value="<?php echo $site->hero_text ?>" class="form-control">
    </div>
    <div class="tab-pane fade" id="herotextEN" role="tabpanel" aria-labelledby="herotextEN-tab">
    <input type="text" name="hero_text_en" placeholder="" value="<?php echo $site->hero_text_en ?>" class="form-control">
    </div>
    </div>
    
    </div>
 

    <div class="form-group">
    <label>Hero Link</label>
    <input type="text" name="hero_link" placeholder="" value="<?php echo $site->hero_link ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Hero Title Link</label>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="herotitleID-tab" data-toggle="tab" href="#herotitleID" role="tab" aria-controls="herotitleID" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="herotitleEN-tab" data-toggle="tab" href="#herotitleEN" role="tab" aria-controls="herotitleEN" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="herotitleID" role="tabpanel" aria-labelledby="herotitleID-tab">
    <input type="text" name="hero_link_title" placeholder="" value="<?php echo $site->hero_link_title ?>" class="form-control">
    </div>
    <div class="tab-pane fade" id="herotitleEN" role="tabpanel" aria-labelledby="herotitleEN-tab">
    <input type="text" name="hero_link_title_en" placeholder="" value="<?php echo $site->hero_link_title_en ?>" class="form-control">
    </div>
    </div>
   
    </div>
  </div><!--hero tab-->

  <div class="tab-pane fade" id="sosmed" role="tabpanel" aria-labelledby="sosmed-tab">
  <h5 class="mb-3">Akun Sosial Media</h5>
    <div class="form-group">
    <label>URL Facebook <i class="fab fa-facebook-square"></i></label>
    <input type="text" name="facebook" placeholder="https://facebook.com/nama" value="<?php echo $site->facebook ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Facebook <i class="fab fa-facebook-square"></i></label>
    <input type="text" name="nama_facebook" placeholder="<?php echo $site->namaweb ?>" value="<?php echo $site->nama_facebook ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>URL Youtube <i class="fab fa-youtube"></i></label>
   <input type="text" name="youtube" placeholder="https://youtube.com/channel" value="<?php echo $site->youtube ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Youtube <i class="fab fa-youtube"></i></label>
    <input type="text" name="nama_youtube" placeholder="Nama akun youtube" value="<?php echo $site->nama_youtube ?>" class="form-control">
    </div>
    
     <div class="form-group">
    <label>URL Instagram <i class="fab fa-instagram"></i></label>
   <input type="text" name="instagram" placeholder="http://instagram.com/nama" value="<?php echo $site->instagram ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Instagram <i class="fab fa-instagram"></i></label>
    <input type="text" name="nama_instagram" placeholder="Nama akun instagram" value="<?php echo $site->nama_instagram ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>URL Twitter <i class="fab fa-twitter"></i></label>
   <input type="text" name="twitter" placeholder="https://twitter.com/nama" value="<?php echo $site->twitter ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Twitter <i class="fab fa-twitter"></i></label>
    <input type="text" name="nama_twitter" placeholder="Nama akun twitter" value="<?php echo $site->nama_twitter ?>" class="form-control">
    </div>

  </div><!--sosmed tab-->
  
  <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
  
  <h5 class="mb-3">Modul SEO (Search Engine Optimization)</h5>
	<div class="form-group">
    <label>Keywords (Keyword search untuk Google, Bing, etc)</label>
    <textarea name="keywords" rows="3" class="form-control" placeholder="Kata kunci / keywords meta"><?php echo $site->keywords ?></textarea>
    </div>
    
    <div class="form-group">
    <label>Metatext</label>
    <textarea name="metatext" rows="5" class="form-control" placeholder="Kode metatext"><?php echo $site->metatext ?></textarea>
    </div>

  </div><!--Seo tab-->

  <div class="tab-pane fade" id="maps" role="tabpanel" aria-labelledby="maps-tab">
  <h5 class="mb-3">Google Map</h5>
    <div class="form-group">
    <label>Google Map</label>
    <textarea name="google_map" rows="5" class="form-control" placeholder="Kode dari Google Map"><?php echo $site->google_map ?></textarea>
    </div>
    
    <div class="form-group map">
        <style type="text/css" media="screen">
            iframe {
                width: 100%;
                max-height: 200px;
            }
        </style>
    <?php echo $site->google_map ?>
    </div>

    <h5>Text di bawah peta dan link downloadnya</h5><hr>
    <div class="form-group">
    <label>Text bawah peta</label>
    <input type="text" name="text_bawah_peta" placeholder="Text bawah peta" value="<?php echo $site->text_bawah_peta ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Link text di bawah peta <i class="fa fa-link"></i></label>
    <input type="text" name="link_bawah_peta" placeholder="Link text di bawah peta" value="<?php echo $site->link_bawah_peta ?>" class="form-control">
    </div>
  
  </div><!--maps tab-->
</div>

    <div class="form-group">
        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
        <input type="reset" name="reset" value="Reset" class="btn btn-default">
    </div>



</div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#mainKonfigurasiNav").addClass('menu-is-opening menu-open');
  $("#KonfigurasiNav").addClass('active');
  $("#konfigurasiUmum .nav-link").addClass('active');
    }); 
  </script>