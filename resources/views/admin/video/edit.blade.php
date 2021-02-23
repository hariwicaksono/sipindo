<div class="modal fade" id="Edit<?php echo $video->id_video ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Video</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
 

<form class="form-horizontal" action="{{ asset('admin/video/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_video" value="<?php echo $video->id_video ?>">
<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Judul Video</label>
	<div class="col-sm-9">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editjudulID<?=$video->id_video?>-tab" data-toggle="tab" href="#editjudulID<?=$video->id_video?>" role="tab" aria-controls="editjudulID<?=$video->id_video?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editjudulEN<?=$video->id_video?>-tab" data-toggle="tab" href="#editjudulEN<?=$video->id_video?>" role="tab" aria-controls="editjudulEN<?=$video->id_video?>" aria-selected="false">EN</a>
    </li>
    </ul>
	<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editjudulID<?=$video->id_video?>" role="tabpanel" aria-labelledby="editjudulID<?=$video->id_video?>-tab">
    <input type="text" name="judul" class="form-control" placeholder="Judul Video" value="<?php echo $video->judul ?>" required>
    </div>
    <div class="tab-pane fade" id="editjudulEN<?=$video->id_video?>" role="tabpanel" aria-labelledby="editjudulEN<?=$video->id_video?>-tab">
    <input type="text" name="judul_en" class="form-control" placeholder="Video Title" value="<?php echo $video->judul_en ?>">
    </div>
    </div>

	</div>

</div>


<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Kode Video Youtube</label>
	<div class="col-sm-7">
		<input type="text" name="video" class="form-control" placeholder="Kode Video Youtube" value="<?php echo $video->video ?>" required>
		<small class="text-gray">Contoh: <span class="text-success">https://www.youtube.com/watch?</span><strong class="text-danger">v=IvjxrQ8c4-w</strong>.
							<br>Copy kode <strong class="text-danger">v=IvjxrQ8c4-w</strong> sebagai kode Youtube.</small>
	</div>
	<div class="col-sm-2">
	<select name="live" class="form-control">
			<option value="no" <?php if($video->live=="no") { echo 'selected'; } ?>>No</option>
			<option value="yes" <?php if($video->live=="yes") { echo 'selected'; } ?>>Yes</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Upload Gambar Cover</label>
	<div class="col-sm-9">
		<input type="file" name="gambar" class="form-control" placeholder="Cover Gambar" value="<?php echo $video->gambar ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Nomor urut tampil</label>
	<div class="col-sm-9">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $video->urutan ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Keterangan</label>
	<div class="col-sm-9">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="editketID<?=$video->id_video?>-tab" data-toggle="tab" href="#editketID<?=$video->id_video?>" role="tab" aria-controls="editketID<?=$video->id_video?>" aria-selected="true">ID</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="editketEN<?=$video->id_video?>-tab" data-toggle="tab" href="#editketEN<?=$video->id_video?>" role="tab" aria-controls="editketEN<?=$video->id_video?>" aria-selected="false">EN</a>
    </li>
    </ul>
	<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="editketID<?=$video->id_video?>" role="tabpanel" aria-labelledby="editketID<?=$video->id_video?>-tab">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $video->keterangan ?></textarea>
    </div>
    <div class="tab-pane fade" id="editketEN<?=$video->id_video?>" role="tabpanel" aria-labelledby="editketEN<?=$video->id_video?>-tab">
    <textarea name="keterangan_en" class="form-control" placeholder="Description"><?php echo $video->keterangan_en ?></textarea>
    </div>
    </div>
		
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Posisi Video</label>
	<div class="col-sm-9">
		<select name="posisi" class="form-control">
			<option value="Homepage" <?php if($video->posisi=="Homepage") { echo 'selected'; } ?>>Halaman Homepage</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Aktif</label>
	<div class="col-sm-9">
		<select name="aktif" class="form-control">
			<option value="1" <?php if($video->aktif=="1") { echo 'selected'; } ?>>Aktif</option>
			<option value="0" <?php if($video->aktif=="0") { echo 'selected'; } ?>>Tidak Aktif</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 text-right"></label>
	<div class="col-sm-9">
		<div class="form-group pull-right">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</form>


</div>
</div>
</div>
</div>