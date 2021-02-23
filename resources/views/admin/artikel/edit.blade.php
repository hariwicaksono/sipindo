<div class="modal fade" id="Edit<?php echo $artikel->id_artikel ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Artikel</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ asset('admin/artikel/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_artikel" value="{{ $artikel->id_artikel }}">
<input type="hidden" name="id_kategori" value="1">

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Judul</label>
  <div class="col-md-10">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editjudulID<?=$artikel->id_artikel?>-tab" data-toggle="tab" href="#editjudulID<?=$artikel->id_artikel?>" role="tab" aria-controls="editjudulID<?=$artikel->id_artikel?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editjudulEN<?=$artikel->id_artikel?>-tab" data-toggle="tab" href="#editjudulEN<?=$artikel->id_artikel?>" role="tab" aria-controls="editjudulEN<?=$artikel->id_artikel?>" aria-selected="false">EN</a>
    </li>
    </ul>
	<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editjudulID<?=$artikel->id_artikel?>" role="tabpanel" aria-labelledby="editjudulID<?=$artikel->id_artikel?>-tab">
    <input type="text" name="judul_artikel" class="form-control" placeholder="Judul Artikel" value="<?php echo $artikel->judul_artikel ?>" required>
    </div>
    <div class="tab-pane fade" id="editjudulEN<?=$artikel->id_artikel?>" role="tabpanel" aria-labelledby="editjudulEN<?=$artikel->id_artikel?>-tab">
    <input type="text" name="judul_artikel_en" class="form-control" placeholder="Article Title" value="<?php echo $artikel->judul_artikel_en ?>">
    </div>
    </div>

  </div>
</div>
 
<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Jenis Font Judul</label>
  <div class="col-md-12">
  <select name="id_font" class="form-control select2">
  <option>Pilih Font</option>
  	<?php foreach($font as $font) { ?>
  	<option value="<?php echo $font->id_font ?>"  <?php if($artikel->id_font==$font->id_font) { echo "selected"; } ?>>
  	<?php echo $font->nama_font ?>/<?php echo $font->styles ?></option>
  	<?php } ?>
  </select>
  </div>
</div>


<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Gambar &amp; Urutan</label>
  <div class="col-md-7">
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
</div>

<div class="col-md-3">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $artikel->urutan ?>">
</div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Keywords</label>
  <div class="col-md-10">
<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $artikel->keywords ?></textarea>
</div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Isi Artikel</label> 
  <div class="col-md-10">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editketID<?=$artikel->id_artikel?>-tab" data-toggle="tab" href="#editketID<?=$artikel->id_artikel?>" role="tab" aria-controls="editketID<?=$artikel->id_artikel?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editketEN<?=$artikel->id_artikel?>-tab" data-toggle="tab" href="#editketEN<?=$artikel->id_artikel?>" role="tab" aria-controls="editketEN<?=$artikel->id_artikel?>" aria-selected="false">EN</a>
    </li>
    </ul>
	<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editketID<?=$artikel->id_artikel?>" role="tabpanel" aria-labelledby="editketID<?=$artikel->id_artikel?>-tab">
    <textarea name="isi" class="form-control textarea" placeholder="Isi Artikel"><?php echo $artikel->isi ?></textarea>
    </div>
    <div class="tab-pane fade" id="editketEN<?=$artikel->id_artikel?>" role="tabpanel" aria-labelledby="editketEN<?=$artikel->id_artikel?>-tab">
    <textarea name="isi_en" class="form-control textarea" placeholder="Article Content"><?php echo $artikel->isi_en ?></textarea>
    </div>
    </div>

  </div>
</div>


<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Status, Tanggal</label>

  <div class="col-md-2">
<select name="status_artikel" class="form-control select2">
  <option value="Publish">Publikasikan</option>
  <option value="Draft" <?php if($artikel->status_artikel=="Draft") { echo "selected"; } ?>>Simpan sebagai Draft</option>
</select>
</div>
<div class="col-md-2">
    <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($artikel->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-2">
  <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s',strtotime($artikel->tanggal_publish)); } ?>">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 text-right"></label>
  <div class="col-md-10">
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary ">
  <i class="fa fa-save"></i> Simpan
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
</div>

</div>

</div>


</div>
</div>
</div>
</div>