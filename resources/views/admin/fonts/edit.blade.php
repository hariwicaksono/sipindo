<div class="modal fade" id="Edit<?php echo $font->id_font ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Font</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ url('admin/font/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_font" value="<?php echo $font->id_font ?>">
<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Nama Font</label>
	<div class="col-sm-9">
		<input type="text" name="nama_font" class="form-control" placeholder="Nama Font" value="<?php echo $font->nama_font ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Styles</label>
	<div class="col-sm-9">
		<select name="styles" class="form-control">
			<option value="100" <?php if($font->styles=="100") { echo 'selected'; } ?>>100</option>
			<option value="300" <?php if($font->styles=="300") { echo 'selected'; } ?>>300</option>
			<option value="400" <?php if($font->styles=="400") { echo 'selected'; } ?>>400</option>
			<option value="500" <?php if($font->styles=="500") { echo 'selected'; } ?>>500</option>
			<option value="600" <?php if($font->styles=="600") { echo 'selected'; } ?>>600</option>
			<option value="700" <?php if($font->styles=="700") { echo 'selected'; } ?>>700</option>
			<option value="900" <?php if($font->styles=="900") { echo 'selected'; } ?>>900</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="form-group pull-right">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		</div>
	</div>
</div>
</form>

</div>
</div>
</div>
</div>