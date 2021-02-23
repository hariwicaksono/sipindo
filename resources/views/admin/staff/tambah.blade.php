
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">

				<h5 class="modal-title" id="myModalLabel">Tambah Member Team</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">

<form class="form-horizontal" action="{{ asset('admin/staff/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Status Tampil &amp; Nomor Urut</label>

<div class="col-md-4">
<select name="status_staff" class="form-control">
  <option value="Ya">Ya, tampilkan di website</option>
  <option value="Tidak">Tidak, jangan tampilkan di website</option>
</select>
</div>
<div class="col-md-3">
<input type="number" name="urutan" class="form-control" placeholder="No urut tampil" value="{{ old('urutan') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Kategori Team</label>
<div class="col-md-9">
<select name="id_kategori_staff" class="form-control select2">
  <?php foreach($kategori_staff as $kategori_staff) { ?>
  <option value="<?php echo $kategori_staff->id_kategori_staff ?>"><?php echo $kategori_staff->nama_kategori_staff ?></option>
  <?php } ?>

</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Nama Staff <span class="text-danger">*</span></label>
<div class="col-md-9">
<input type="text" name="nama_staff" class="form-control" placeholder="Nama staff" value="{{ old('nama_staff') }}" required>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Jabatan</label>
<div class="col-md-9">
<input type="text" name="jabatan" class="form-control" placeholder="Jabatan (Position)" value="{{ old('jabatan') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Pendidikan Terakhir</label>
<div class="col-md-9">
<input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" value="{{ old('pendidikan') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Expertise</label>
<div class="col-md-9">
<input type="text" name="expertise" class="form-control" placeholder="Expertise" value="{{ old('expertise') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Data Kontak</label>
<div class="col-md-5">
<input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
</div>
<div class="col-md-4">
<input type="text" name="telepon" class="form-control" placeholder="Telepon/HP" value="{{ old('telepon') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right"></label>
<div class="col-md-5">
<input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{ old('facebook') }}">
</div>
<div class="col-md-4">
<input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{ old('twitter') }}">
</div>
</div>


<div class="row form-group">
<label class="col-md-3 col-form-label text-right"></label>
<div class="col-md-5">
<input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{ old('instagram') }}">
</div>
<div class="col-md-4">
<input type="text" name="linkedin" class="form-control" placeholder="LinkedIn" value="{{ old('linkedin') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Upload Gambar/Foto</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Deskripsi Lengkap</label>
<div class="col-md-9">
<textarea name="isi" class="form-control textarea" placeholder="Isi staff">{{ old('isi') }}</textarea>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 col-form-label text-right">Keywords pencarian di Google</label>
<div class="col-md-6">
<textarea name="keywords" id="keywords" class="form-control" placeholder="Keywords pencarian di Google">{{ old('keywords') }}</textarea>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right"></label>
<div class="col-md-9">
<div>
<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
<button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
<input type="reset" name="reset" class="btn btn-default" value="Reset">
</div>
</div>
</div>
</form>
</div>
		</div>
	</div>
</div>