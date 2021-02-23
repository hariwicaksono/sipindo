
<div class="modal fade" id="Edit<?php echo $staff->id_staff ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Team Member</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ url('admin/staff/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_staff" value="{{ $staff->id_staff }}">
<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Tampil &amp; Nomor Urut</label>

<div class="col-md-5">
<select name="status_staff" class="form-control">
  <option value="Ya">Ya, tampilkan di website</option>
  <option value="Tidak" <?php if($staff->status_staff=="Tidak") { echo 'selected'; } ?>>Tidak, jangan tampilkan di website</option>
</select>
</div>
<div class="col-md-4">
<input type="number" name="urutan" class="form-control" placeholder="No urut tampil" value="{{ $staff->urutan }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Nama<span class="text-danger">*</span></label>
<div class="col-md-9">
<input type="text" name="nama_staff" class="form-control" placeholder="Nama staff" value="{{ $staff->nama_staff }}" required>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Jabatan (Position)</label>
<div class="col-md-9">
<input type="text" name="jabatan" class="form-control" placeholder="Jabatan (Position)" value="{{ $staff->jabatan }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Pendidikan Terakhir</label>
<div class="col-md-9">
<input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" value="{{ $staff->pendidikan }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Expertise</label>
<div class="col-md-9">
<input type="text" name="expertise" class="form-control" placeholder="Expertise" value="{{ $staff->expertise }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Data Kontak</label>
<div class="col-md-4">
<input type="text" name="email" class="form-control" placeholder="Email" value="{{ $staff->email }}">
</div>
<div class="col-md-4">
<input type="text" name="telepon" class="form-control" placeholder="Telepon/HP" value="{{ $staff->telepon }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right"></label>
<div class="col-md-4">
<input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{ $staff->facebook }}">
</div>
<div class="col-md-4">
<input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{ $staff->twitter }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right"></label>
<div class="col-md-4">
<input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{ $staff->instagram }}">
</div>
<div class="col-md-4">
<input type="text" name="linkedin" class="form-control" placeholder="LinkedIn" value="{{ $staff->linkedin }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Upload Gambar/Foto</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
<?php if($staff->gambar!="") { ?>
<img src="{{ asset('uploads/image/staff/thumbs/'.$staff->gambar) }}" class="img img-thumbnail" width="80">
<?php } ?>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Deskripsi Lengkap</label>
<div class="col-md-9">
<textarea name="isi" class="form-control textarea" placeholder="Isi staff">{{ $staff->isi }}</textarea>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Keywords pencarian di Google</label>
<div class="col-md-6">
<textarea name="keywords" id="keywords" class="form-control" placeholder="Keywords pencarian di Google">{{ $staff->keywords }}</textarea>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right"></label>
<div class="col-md-9">
<div>
<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
<button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</form>

</div>
</div>
</div>
</div>