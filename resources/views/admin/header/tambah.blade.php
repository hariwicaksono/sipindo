
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Tambah Data Header</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form class="form-horizontal" action="{{ url('admin/header/tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}

<div class="form-group row">
	<label class="col-md-3  col-form-label">Header untuk Halaman</label>
	<div class="col-md-9">
		<select name="halaman" class="form-control">
			<option value="Global">Global</option>
			<option value="Artikel">Halaman Artikel</option>
			<option value="Blog">Halaman Blog</option>
			<option value="Kontak">Halaman Kontak</option>
			<option value="Team">Halaman Team</option>
			<option value="Dokumen">Halaman Dokumen</option>
			<option value="Layanan">Halaman Layanan</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3  col-form-label">Upload Gambar Status</label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Upload Gambar" value="" required>
		@if ($errors->has('gambar'))
	      	<span class="text-danger">{{ $errors->first('gambar') }}</span>
	    @endif  
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3  col-form-label">Nama Status</label>
	<div class="col-md-9">
		<input type="text" name="judul_header" class="form-control" placeholder="Nama kategori berita" value="" required>
		@if ($errors->has('judul_header'))
	      	<span class="text-danger">{{ $errors->first('judul_header') }}</span>
	    @endif  
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3  col-form-label">Keterangan</label>
	<div class="col-md-9">
		<textarea name="keterangan" class="form-control simple" placeholder="Keterangan"></textarea>
		@if ($errors->has('keterangan'))
	      	<span class="text-danger">{{ $errors->first('keterangan') }}</span>
	    @endif  
	</div>
</div>



<div class="form-group row">
	<label class="col-md-3"></label>
	<div class="col-md-9">
<div>
<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
</div>
</div>
</div>
<div class="clearfix"></div>

</form>

</div>
</div>
</div>
</div>
