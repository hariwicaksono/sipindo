
<div class="modal fade" id="Edit<?php echo $galeri->id_galeri ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Galeri</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ asset('admin/galeri/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_galeri" value="{{ $galeri->id_galeri }}">

<div class="row form-group">
	<label class="col-md-3 col-form-label text-right">Judul Galeri</label>
	<div class="col-md-9">
		<input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri" value="<?php echo $galeri->judul_galeri ?>">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3 col-form-label text-right">Posisi, Status Text dan Urutan</label>
	<div class="col-md-3">
		<select name="jenis_galeri" class="form-control">
			<option value="Homepage" 
			<?php if($galeri->jenis_galeri=="Homepage") { echo "selected"; } ?>
			>Homepage</option>
		</select>
		<small class="text-muted">Posisi galeri</small>
	</div>
	<div class="col-md-3">
		<select name="status_text" class="form-control">
			<option value="Tidak" <?php if($galeri->status_text=="Tidak") { echo "selected"; } ?>>Tidak</option>
			<option value="Ya" <?php if($galeri->status_text=="Ya") { echo "selected"; } ?>>Ya, tampilkan</option>
		</select>
		<small class="text-muted">Tampilkan teks</small>
	</div>
	
	<div class="col-md-3">
		<input type="number" name="urutan" class="form-control" placeholder="No urut tampil"  value="<?php echo $galeri->urutan ?>">
		<small class="text-muted">Urutan tampil</small>
	</div>
</div>

	<div class="row form-group">
		<label class="col-md-3 col-form-label text-right">Upload gambar</label>
		<div class="col-md-9">
			<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3 col-form-label text-right">Teks Galeri</label>
		<div class="col-md-9">
			<textarea name="isi" id="isi" class="form-control" id="kontenku" placeholder="Isi Galeri"><?php echo $galeri->isi ?></textarea>
		</div> 
	</div>

	<div class="row form-group">
		<label class="col-md-3 col-form-label text-right">Link/website terkait Galeri</label>
		<div class="col-md-9">
			<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $galeri->website ?>">
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3 col-form-label text-right"></label>
		<div class="col-md-9">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
			<input type="reset" name="reset" class="btn btn-default " value="Reset">
		</div>
	</div>
</div>
</form>

</div>
</div>
</div>
</div>