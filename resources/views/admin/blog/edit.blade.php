<div class="modal fade" id="Edit<?php echo $blog->id_blog ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Blog</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">


<form class="form-horizontal" action="{{ url('admin/blog/proses_edit') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_blog" value="{{ $blog->id_blog }}">
<input type="hidden" name="id_kategori" value="2">

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Judul Blog</label>
  <div class="col-md-10">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editjudulID<?=$blog->id_blog?>-tab" data-toggle="tab" href="#editjudulID<?=$blog->id_blog?>" role="tab" aria-controls="editjudulID<?=$blog->id_blog?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editjudulEN<?=$blog->id_blog?>-tab" data-toggle="tab" href="#editjudulEN<?=$blog->id_blog?>" role="tab" aria-controls="editjudulEN<?=$blog->id_blog?>" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editjudulID<?=$blog->id_blog?>" role="tabpanel" aria-labelledby="editjudulID<?=$blog->id_blog?>-tab">
    <input type="text" name="judul_blog" class="form-control" placeholder="Judul Nlog" value="<?php echo $blog->judul_blog ?>" required>
    </div>
    <div class="tab-pane fade" id="editjudulEN<?=$blog->id_blog?>" role="tabpanel" aria-labelledby="editjudulEN<?=$blog->id_blog?>-tab">
    <input type="text" name="judul_blog_en" class="form-control" placeholder="Blog Title" value="<?php echo $blog->judul_blog_en ?>" >
    </div>
    </div>

   
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Upload Gambar / Urutan</label>
  <div class="col-md-7">
<input type="file" name="gambar" class="form-control" placeholder="Upload Gambar">
</div>
<div class="col-md-3">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $blog->urutan ?>">
</div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Keywords</label>
  <div class="col-md-10">
<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $blog->keywords ?></textarea>
</div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Isi Blog</label> 
  <div class="col-md-10">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editketID<?=$blog->id_blog?>-tab" data-toggle="tab" href="#editketID<?=$blog->id_blog?>" role="tab" aria-controls="editketID<?=$blog->id_blog?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editketEN<?=$blog->id_blog?>-tab" data-toggle="tab" href="#editketEN<?=$blog->id_blog?>" role="tab" aria-controls="editketEN<?=$blog->id_blog?>" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editketID<?=$blog->id_blog?>" role="tabpanel" aria-labelledby="editketID<?=$blog->id_blog?>-tab">
    <textarea name="isi" class="form-control textarea" placeholder="Isi Blog" placeholder="Isi Blog"><?php echo $blog->isi ?></textarea>
    </div>
    <div class="tab-pane fade" id="editketEN<?=$blog->id_blog?>" role="tabpanel" aria-labelledby="editketEN<?=$blog->id_blog?>-tab">
    <textarea name="isi_en" class="form-control textarea" placeholder="Blog Content" placeholder="Blog Content"><?php echo $blog->isi_en ?></textarea>
    </div>
    </div>

  </div>
</div>


<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Status, Tanggal</label>

  <div class="col-md-2">
<select name="status_blog" class="form-control select2">
  <option value="Publish">Publikasikan</option>
  <option value="Draft" <?php if($blog->status_blog=="Draft") { echo "selected"; } ?>>Simpan sebagai Draft</option>
</select>
</div>
<div class="col-md-2">
    <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($blog->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-2">
  <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s',strtotime($blog->tanggal_publish)); } ?>">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 text-right"></label>
  <div class="col-md-10">
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary ">
  <i class="fa fa-save"></i> Simpan
</button>
<input type="reset" name="reset" class="btn btn-default " value="Reset">
</div>

</div>

</div>

</div>
</div>
</div>
</div>