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
    <div class="callout callout-danger py-2">
    <h6 class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h6>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 


  <form action="{{ asset('admin/smartseeds/proses_profil') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}

<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

    <div class="row">

    <div class="col-9">
    <div class="form-group">
    <label>Nama</label>
    <input type="text" name="smartseeds" placeholder="SMARTseeds B2B Dashboard" value="<?php echo $site->smartseeds ?>" required class="form-control">
    </div>

    <div class="form-group ">
    <label>Deskripsi</label>
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
    <textarea name="smartseeds_deskripsi" rows="3" class="form-control textarea" id="smartseeds_deskripsi" placeholder="Deskripsi lengkap"><?php echo $site->smartseeds_deskripsi ?></textarea>
    </div>
    <div class="tab-pane fade" id="deskripsiEN" role="tabpanel" aria-labelledby="deskripsiEN-tab">
    <textarea name="smartseeds_deskripsi_en" rows="3" class="form-control textarea" id="smartseeds_deskripsi_en" placeholder="Deskripsi lengkap"><?php echo $site->smartseeds_deskripsi_en ?></textarea>
    </div>
    </div>
    
    </div>

    <div class="form-group ">
    <label>Fitur</label>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="fiturID-tab" data-toggle="tab" href="#fiturID" role="tab" aria-controls="fiturID" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="fiturEN-tab" data-toggle="tab" href="#fiturEN" role="tab" aria-controls="fiturEN" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="fiturID" role="tabpanel" aria-labelledby="fiturID-tab">
    <textarea name="smartseeds_fitur" rows="3" class="form-control textarea" id="smartseeds_fitur" placeholder="Fitur-fitur SMARTseeds B2B Dashboard"><?php echo $site->smartseeds_fitur ?></textarea>
    </div>
    <div class="tab-pane fade" id="fiturEN" role="tabpanel" aria-labelledby="fiturEN-tab">
    <textarea name="smartseeds_fitur_en" rows="3" class="form-control textarea" id="smartseeds_fitur_en" placeholder="Fitur-fitur SMARTseeds B2B Dashboard"><?php echo $site->smartseeds_fitur_en ?></textarea>
    </div>
    </div>

    
    </div>

    <div class="form-group">
        <label>Gambar Profil</label>
        <input type="file" name="smartseeds_gambar" class="form-control mb-2" id="file">
        <div id="imagePreview"></div>
    </div>

    </div><!--col-->

    <div class="col-3">
    <div class="form-group ">
        <label>Gambar saat ini</label><br>
        <img src="{{ asset('uploads/image/'.$site->smartseeds_gambar) }}" class="img-fluid">
    </div>
    </div>

    </div>

    <div class="form-group">
    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-default">
    </div>

   
</form>


<script type="text/javascript">
    $(document).ready(function() {
        $("#mainSmartseeds").addClass('menu-is-opening menu-open');
  $("#SmartseedsNav").addClass('active');
  $("#ProfilSm .nav-link").addClass('active');
    }); 
  </script>