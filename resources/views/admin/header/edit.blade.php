
<div class="modal fade" id="Edit<?php echo $header->id_header ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header  py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Header</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form class="form-horizontal" action="{{ asset('admin/header/edit') }}" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_header"   value="{{ $header->id_header }}">

<div class="form-group row">
	<label class="col-md-3">Header untuk Halaman</label>
	<div class="col-md-9">
		<select name="halaman" class="form-control">
		<option value="Global" <?php if($header->halaman=="Global") { echo 'selected'; } ?>>Global</option>
			<option value="Artikel" <?php if($header->halaman=="Artikel") { echo 'selected'; } ?>>Halaman Artikel</option>
			<option value="Blog" <?php if($header->halaman=="Blog") { echo 'selected'; } ?>>Halaman Blog</option>
			<option value="Team" <?php if($header->halaman=="Team") { echo 'selected'; } ?>>Halaman Team</option>
			<option value="Kontak" <?php if($header->halaman=="Kontak") { echo 'selected'; } ?>>Halaman Kontak</option>
			<option value="Dokumen" <?php if($header->halaman=="Dokumen") { echo 'selected'; } ?>>Halaman Dokumen</option>
			<option value="Layanan" <?php if($header->halaman=="Layanan") { echo 'selected'; } ?>>Halaman Layanan</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Upload Gambar Status</label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Upload Gambar" value="">
		@if ($errors->has('gambar'))
	      	<span class="text-danger">{{ $errors->first('gambar') }}</span>
	    @endif  
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Nama Status</label>
	<div class="col-md-9">
		<input type="text" name="judul_header" class="form-control" placeholder="Nama kategori berita" value="<?php echo $header->judul_header ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Keterangan</label>
	<div class="col-md-9">
		<textarea name="keterangan" class="form-control simple" placeholder="Keterangan">{{ $header->keterangan }}</textarea>
		@if ($errors->has('keterangan'))
	      	<span class="text-danger">{{ $errors->first('keterangan') }}</span>
	    @endif  
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3"></label>
	<div class="col-md-9">
<div>
<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
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
