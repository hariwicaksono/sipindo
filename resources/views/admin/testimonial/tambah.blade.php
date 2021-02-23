
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header py-2">
 
				<h6 class="modal-title" id="myModalLabel">Tambah Testimoni</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ asset('admin/testimonial/tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Nama</label>
					<div class="col-sm-9">
						<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
					</div>
				</div>
				

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Perusahaan/Instansi</label>
					<div class="col-sm-9">
						<input type="text" name="perusahaan" class="form-control" placeholder="Nama Perusahaan/Instansi" value="{{ old('perusahaan') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Upload Foto</label>
					<div class="col-sm-9">
						<input type="file" name="gambar" class="form-control" placeholder="Foto" value="{{ old('gambar') }}">
					</div>
				</div>


				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Keterangan</label>
					<div class="col-sm-9">
						<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan') }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 text-right"></label>
					<div class="col-sm-9">
						<div class="form-group pull-right">
							<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
							<button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
							<input type="reset" name="reset" class="btn btn-default " value="Reset">
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				</form>

			</div>
		</div>
	</div>
</div>
