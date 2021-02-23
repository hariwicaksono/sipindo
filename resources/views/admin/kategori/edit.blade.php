
<div class="modal fade" id="Edit<?php echo $kategori->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Kategori</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form class="form-horizontal" action="{{ asset('admin/kategori/edit') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_kategori" value="{{ $kategori->id_kategori }}">
<div class="form-group row">
	<label class="col-md-3 col-form-label text-right">Nama Kategori</label>
	<div class="col-md-9">
		<input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori berita" value="<?php echo $kategori->nama_kategori ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3 col-form-label text-right">Nomor urut</label>
	<div class="col-md-9">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori->urutan ?>" required>
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
