<div class="modal fade" id="Edit<?php echo $user->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data Pengguna</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ url('admin/user/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">
<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Nama lengkap</label>
	<div class="col-sm-9">
		<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Email</label>
	<div class="col-sm-9">
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Username</label>
	<div class="col-sm-9">
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required>
	</div>
</div>

<!--<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Password</label>
	<div class="col-sm-9">
		<input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
	</div>
</div>-->

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Level Hak Akses</label>
	<div class="col-sm-9">
		<select name="akses_level" class="form-control">
			<option value="Admin" <?php if($user->akses_level=="Admin") { echo 'selected'; } ?>>Admin</option>
			<!--<option value="User" <?php //if($user->akses_level=="User") { echo 'selected'; } ?>>User</option>-->
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 col-form-label text-right">Upload foto profil</label>
	<div class="col-sm-9">
		<input type="file" name="gambar" class="form-control" placeholder="Upload Foto" value="{{ old('gambar') }}">
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