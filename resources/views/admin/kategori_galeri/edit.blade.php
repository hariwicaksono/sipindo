
<div class="modal fade" id="Edit<?php echo $kategori_galeri->id_kategori_galeri ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Katagori Galeri</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<form class="form-horizontal" action="{{ asset('admin/kategori_galeri/proses_edit') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_kategori_galeri" value="{{ $kategori_galeri->id_kategori_galeri }}">
<div class="form-group row">
	<label class="col-md-3 col-form-label text-right">Nama Kategori</label>
	<div class="col-md-9">
		<input type="text" name="nama_kategori_galeri" class="form-control" placeholder="Nama kategori" value="<?php echo $kategori_galeri->nama_kategori_galeri ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3 col-form-label text-right">Nomor urut</label>
	<div class="col-md-9">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori_galeri->urutan ?>" required>
</div>
</div>

<div class="form-group row">
	<label class="col-md-3 text-right"></label>
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
