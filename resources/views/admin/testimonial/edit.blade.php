
<div class="modal fade" id="Edit<?php echo $testimonial->id_testimonial ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Testimoni</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
 
<form class="form-horizontal" action="{{ asset('admin/testimonial/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_testimonial" value="<?php echo $testimonial->id_testimonial ?>">
<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Nama</label>
	<div class="col-sm-9">
		<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $testimonial->nama ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Perusahaan</label>
	<div class="col-sm-9">
		<input type="text" name="perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $testimonial->perusahaan ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Upload Foto</label>
	<div class="col-sm-9">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo $testimonial->gambar ?>">
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Keterangan</label>
	<div class="col-sm-9">
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $testimonial->keterangan ?></textarea>
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