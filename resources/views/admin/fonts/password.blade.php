<div class="modal fade" id="EditPasswd<?php echo $user->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Pengguna</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ asset('admin/user/proses_password') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">


<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Password</label>
	<div class="col-sm-9">
		<input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
		<small class="text-muted">Password Lama: <?php echo $user->kode_rahasia ?>  </small>
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