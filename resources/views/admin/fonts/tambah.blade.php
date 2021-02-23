 
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header py-2">

				<h6 class="modal-title" id="myModalLabel">Tambah Data Font</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ url('admin/font/proses_tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Nama Font</label>
					<div class="col-sm-9">
						<input type="text" name="nama_font" class="form-control" placeholder="Nama Font contoh: Roboto" value="{{ old('nama') }}" required>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Styles</label>
					<div class="col-sm-9">
						<select name="styles" class="form-control">
							<option value="100">100</option>
							<option value="200">200</option>
							<option value="300">300</option>
							<option value="400">400</option>
							<option value="500">500</option>
							<option value="600">600</option>
							<option value="700">700</option>
							<option value="800">800</option>
							<option value="900">900</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right"></label>
					<div class="col-sm-9">
 				<div class="callout callout-info">
 				<i class="fas fa-info"></i> Lihat daftar Font di <a class="text-dark" href="https://fonts.google.com" target="_blank">Google Fonts</a>
				 </div>
				 </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right"></label>
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
