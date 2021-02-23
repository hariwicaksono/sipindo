
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header py-2">
 
				<h6 class="modal-title" id="myModalLabel">Tambah Galeri</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
 
<form class="form-horizontal" action="{{ asset('admin/galeri/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Upload Gambar</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Judul Galeri</label>
<div class="col-md-9">
<input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri" value="{{ old('judul_galeri') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Posisi, Status Text dan Urutan</label>
<div class="col-md-3">
<select name="jenis_galeri" class="form-control">
    <option value="Homepage">Homepage</option>
</select>
<small class="text-muted">Posisi Galeri</small>
</div>
<div class="col-md-3">
<select name="status_text" class="form-control">
		<option value="Tidak">Tidak</option>
	<option value="Ya">Ya, tampilkan</option>
	
</select>
<small class="text-muted">Tampilkan Teks?</small>
</div>
<div class="col-md-3">
<input type="number" name="urutan" class="form-control" placeholder="No urut tampil" value="{{ old('urutan') }}">
<small class="text-muted">Urutan</small>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Kategori Galeri</label>
<div class="col-md-9">
<select name="id_kategori_galeri" class="form-control">
	<?php foreach($kategori_galeri as $kategori_galeri) { ?>
	<option value="<?php echo $kategori_galeri->id_kategori_galeri ?>"><?php echo $kategori_galeri->nama_kategori_galeri ?></option>
	<?php } ?>

</select>
</div>
</div>



<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Teks Galeri</label>
<div class="col-md-9">
<textarea name="isi" id="isi" class="form-control" id="kontenku" placeholder="Isi galeri">{{ old('isi') }}</textarea>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Link / website yang terkait dengan Galeri</label>
<div class="col-md-9">
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="{{ old('website') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right"></label>
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
