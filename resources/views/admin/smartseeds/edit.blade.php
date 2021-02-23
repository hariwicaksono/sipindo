
<div class="modal fade" id="Edit<?php echo $site->id_smartseeds ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data SMARTseeds Konten</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
 
<form class="form-horizontal" action="{{ url('admin/smartseeds/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_smartseeds" value="<?php echo $site->id_smartseeds ?>">
<div class="form-group row">
	<label class="col-sm-2 col-form-label text-right">Fitur</label>
	<div class="col-sm-10">

	<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<a class="nav-link active" id="editfiturID-tab" data-toggle="tab" href="#editfiturID" role="tab" aria-controls="editfiturID" aria-selected="true">ID</a>
	</li>
	<li class="nav-item" role="presentation">
		<a class="nav-link" id="editfiturEN-tab" data-toggle="tab" href="#editfiturEN" role="tab" aria-controls="editfiturEN" aria-selected="false">EN</a>
	</li>
	</ul>
	<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="edittanyaID" role="tabpanel" aria-labelledby="editfiturID-tab">
	<input type="text" name="fitur" class="form-control" placeholder="Fitur" value="<?php echo $site->fitur ?>" required>
	</div>
	<div class="tab-pane fade" id="editfiturEN" role="tabpanel" aria-labelledby="editfiturEN-tab">
	<input type="text" name="fitur_en" class="form-control" placeholder="Feature" value="<?php echo $site->fitur_en ?>">
	</div>
	</div>
	
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label text-right">Upload Gambar</label>
	<div class="col-sm-10">
		<input type="file" name="gambar" class="form-control" placeholder="Foto" value="{{ old('gambar') }}">
		<span class="text-muted">Gambar saat ini:</span><br/>
		<img src="{{ asset('uploads/image/thumbs/'.$site->gambar) }}" class="img-fluid" width="100" >
		
	</div>
</div>
 
<div class="form-group row">
	<label class="col-sm-2 col-form-label text-right">Isi Konten</label>
	<div class="col-sm-10">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="editkontenID-tab" data-toggle="tab" href="#editkontenID" role="tab" aria-controls="editkontenID" aria-selected="true">ID</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="editkontenEN-tab" data-toggle="tab" href="#editkontenEN" role="tab" aria-controls="editkontenEN" aria-selected="false">EN</a>
		</li>
		</ul>
		<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="editkontenID" role="tabpanel" aria-labelledby="editkontenID-tab">
		<textarea name="konten" class="form-control textarea" placeholder="Konten"><?php echo $site->konten ?></textarea>
		</div>
		<div class="tab-pane fade" id="editkontenEN" role="tabpanel" aria-labelledby="editkontenEN-tab">
		<textarea name="konten_en" class="form-control textarea" placeholder="Content"><?php echo $site->konten_en ?></textarea>
		</div>
		</div>
	
	</div>
</div>

<div class="form-group row">
					<label class="col-sm-2 text-right">Posisi Konten</label>
					<div class="col-sm-10">
					<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="kiri" name="posisi" value="Kiri" <?php if($site->posisi=="Kiri") { echo 'checked=checked'; } ?>>
				<label class="form-check-label" for="kiri">Kiri</label>
				</div>
				<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="kanan" name="posisi" value="Kanan" <?php if($site->posisi=="Kanan") { echo 'checked=checked'; } ?>>
				<label class="form-check-label" for="kanan">Kanan</label>
				</div>
				</div>
				</div>

<div class="form-group row">
	<label class="col-sm-2 text-right"></label>
	<div class="col-sm-10">
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