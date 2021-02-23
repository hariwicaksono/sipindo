
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header py-2">
 
				<h6 class="modal-title" id="myModalLabel">Tambah SMARTseeds Konten</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ url('admin/smartseeds/proses_tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				{{ csrf_field() }}

				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label text-right">Fitur</label>
					<div class="col-sm-10">

						<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="addfiturID-tab" data-toggle="tab" href="#addfiturID" role="tab" aria-controls="addfiturID" aria-selected="true">ID</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="addfiturEN-tab" data-toggle="tab" href="#addfiturEN" role="tab" aria-controls="addfiturEN" aria-selected="false">EN</a>
						</li>
						</ul>
						<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="addfiturID" role="tabpanel" aria-labelledby="addfiturID-tab">
						<input type="text" name="fitur" class="form-control" placeholder="Fitur" value="{{ old('fitur') }}" required>
						</div>
						<div class="tab-pane fade" id="addfiturEN" role="tabpanel" aria-labelledby="addfiturEN-tab">
						<input type="text" name="fitur_en" class="form-control" placeholder="Feature" value="{{ old('fitur_en') }}">
						</div>
						</div>
						
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label text-right">Upload Gambar</label>
					<div class="col-sm-10">
						<input type="file" name="gambar" class="form-control" placeholder="Foto" value="{{ old('gambar') }}">
					
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label text-right">Isi Konten</label>
					<div class="col-sm-10">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="addkontenID-tab" data-toggle="tab" href="#addkontenID" role="tab" aria-controls="addkontenID" aria-selected="true">ID</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="addkontenEN-tab" data-toggle="tab" href="#addkontenEN" role="tab" aria-controls="addkontenEN" aria-selected="false">EN</a>
						</li>
						</ul>
						<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="addkontenID" role="tabpanel" aria-labelledby="addkontenID-tab">
						<textarea name="konten" class="form-control textarea" placeholder="Konten">{{ old('konten') }}</textarea>
						</div>
						<div class="tab-pane fade" id="addkontenEN" role="tabpanel" aria-labelledby="addkontenEN-tab">
						<textarea name="konten_en" class="form-control textarea" placeholder="Content">{{ old('konten_en') }}</textarea>
						</div>
						</div>
					
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 text-right">Posisi Konten</label>
					<div class="col-sm-10">
					<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="kiri" name="posisi" value="Kiri">
				<label class="form-check-label" for="kiri">Kiri</label>
				</div>
				<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="kanan" name="posisi" value="Kanan">
				<label class="form-check-label" for="kanan">Kanan</label>
				</div>
				</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 text-right"></label>
					<div class="col-sm-10">
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
