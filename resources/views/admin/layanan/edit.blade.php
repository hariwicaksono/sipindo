<div class="modal fade" id="Edit<?php echo $layanan->id_layanan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Layanan</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ asset('admin/layanan/proses_edit') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_layanan" value="{{ $layanan->id_layanan }}">
<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Judul</label>
  <div class="col-md-10">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editjudulID<?=$layanan->id_layanan?>-tab" data-toggle="tab" href="#editjudulID<?=$layanan->id_layanan?>" role="tab" aria-controls="editjudulID<?=$layanan->id_layanan?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editjudulEN<?=$layanan->id_layanan?>-tab" data-toggle="tab" href="#editjudulEN<?=$layanan->id_layanan?>" role="tab" aria-controls="editjudulEN<?=$layanan->id_layanan?>" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editjudulID<?=$layanan->id_layanan?>" role="tabpanel" aria-labelledby="editjudulID<?=$layanan->id_layanan?>-tab">
    <input type="text" name="judul_layanan" class="form-control" placeholder="Judul Layanan" value="<?php echo $layanan->judul_layanan ?>" required>
    </div>
    <div class="tab-pane fade" id="editjudulEN<?=$layanan->id_layanan?>" role="tabpanel" aria-labelledby="editjudulEN<?=$layanan->id_layanan?>-tab">
    <input type="text" name="judul_layanan_en" class="form-control" placeholder="Service Title" value="<?php echo $layanan->judul_layanan_en ?>">
    </div>
    </div>
    
  </div>
</div>

<?php if($layanan->jenis_layanan=='Layanan') { ?>
<input type="hidden" name="jenis_layanan" value="<?php echo $layanan->jenis_layanan ?>">
<input type="hidden" name="id_kategori" value="1">
<?php }else{ ?>
<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Kategori</label>
  <div class="col-md-6">
  <select name="id_kategori" class="form-control select2">
  	<?php foreach($kategori as $kategori) { ?>
  	<option value="<?php echo $kategori->id_kategori ?>"  <?php if($layanan->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>>
  	<?php echo $kategori->nama_kategori ?></option>
  	<?php } ?>
  </select>
  </div>
</div>
<input type="hidden" name="jenis_layanan" value="Layanan">
<?php } ?>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Upload Gambar, Urutan</label>
  <div class="col-md-7">
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
</div>

<div class="col-md-3">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $layanan->urutan ?>">
</div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Keywords</label>
  <div class="col-md-10">
<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $layanan->keywords ?></textarea>
</div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Isi Layanan</label> 
  <div class="col-md-10">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editketID<?=$layanan->id_layanan?>-tab" data-toggle="tab" href="#editketID<?=$layanan->id_layanan?>" role="tab" aria-controls="editketID<?=$layanan->id_layanan?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editketEN<?=$layanan->id_layanan?>-tab" data-toggle="tab" href="#editketEN<?=$layanan->id_layanan?>" role="tab" aria-controls="editketEN<?=$layanan->id_layanan?>" aria-selected="false">EN</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editketID<?=$layanan->id_layanan?>" role="tabpanel" aria-labelledby="editketID<?=$layanan->id_layanan?>-tab">
    <textarea name="isi" class="form-control textarea" placeholder="Isi Layanan"><?php echo $layanan->isi ?></textarea>
    </div>
    <div class="tab-pane fade" id="editketEN<?=$layanan->id_layanan?>" role="tabpanel" aria-labelledby="editketEN<?=$layanan->id_layanan?>-tab">
    <textarea name="isi_en" class="form-control textarea" placeholder="Service Content"><?php echo $layanan->isi_en ?></textarea>
    </div>
    </div>
  
  </div>
</div>


<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Status, Tanggal</label>

  <div class="col-md-2">
<select name="status_layanan" class="form-control select2">
  <option value="Publish">Publikasikan</option>
  <option value="Draft" <?php if($layanan->status_layanan=="Draft") { echo "selected"; } ?>>Simpan sebagai Draft</option>
</select>
</div>
<div class="col-md-2">
    <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($layanan->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-2">
  <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s',strtotime($layanan->tanggal_publish)); } ?>">
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