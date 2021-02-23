 
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header py-2">

				<h6 class="modal-title" id="myModalLabel">Tambah Video</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ asset('admin/video/proses_tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Judul Video</label>
					<div class="col-sm-9">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="addjudulID-tab" data-toggle="tab" href="#addjudulID" role="tab" aria-controls="addjudulID" aria-selected="true">ID</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="addjudulEN-tab" data-toggle="tab" href="#addjudulEN" role="tab" aria-controls="addjudulEN" aria-selected="false">EN</a>
					</li>
					</ul>
					<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="addjudulID" role="tabpanel" aria-labelledby="addjudulID-tab">
					<input type="text" name="judul" class="form-control" placeholder="Judul Video" value="{{ old('judul') }}" required>
					</div>
					<div class="tab-pane fade" id="addjudulEN" role="tabpanel" aria-labelledby="addjudulEN-tab">
					<input type="text" name="judul_en" class="form-control" placeholder="Video Title" value="{{ old('judul_en') }}">
					</div>
					</div>
						
					</div>
				
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Kode Video Youtube</label>
					<div class="col-sm-7">
						<input type="text" name="video" class="form-control" placeholder="Kode Video Youtube" value="{{ old('video') }}" required>
						<small class="text-gray">Contoh: <span class="text-success">https://www.youtube.com/watch?</span><strong class="text-danger">v=IvjxrQ8c4-w</strong>.
							<br>Copy kode <strong class="text-danger">v=IvjxrQ8c4-w</strong> sebagai kode Youtube.</small>
					</div>
					<div class="col-sm-2">
					<select name="live" class="form-control" required>
					<option>Live?</option>
							<option value="no">No</option>
							<option value="yes">Yes</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Upload Gambar Cover</label>
					<div class="col-sm-9">
						<input type="file" name="gambar" class="form-control" placeholder="Cover Gambar" value="{{ old('gambar') }}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Nomor urut tampil</label>
					<div class="col-sm-9">
						<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Keterangan</label>
					<div class="col-sm-9">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="addketeranganID-tab" data-toggle="tab" href="#addketeranganID" role="tab" aria-controls="addketeranganID" aria-selected="true">ID</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="addketeranganEN-tab" data-toggle="tab" href="#addketeranganEN" role="tab" aria-controls="addketeranganEN" aria-selected="false">EN</a>
					</li>
					</ul>
					<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="addketeranganID" role="tabpanel" aria-labelledby="addketeranganID-tab">
					<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan') }}</textarea>
					</div>
					<div class="tab-pane fade" id="addketeranganEN" role="tabpanel" aria-labelledby="addketeranganEN-tab">
					<textarea name="keterangan_en" class="form-control" placeholder="Description">{{ old('keterangan_en') }}</textarea>
					</div>
					</div>
						
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Posisi Video</label>
					<div class="col-sm-9">
						<select name="posisi" class="form-control">
						<option value="Homepage">Halaman Homepage</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-right">Aktif</label>
					<div class="col-sm-9">
						<select name="aktif" class="form-control">
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
						</select>
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
				</div>
				</form>

			</div>
		</div>
	</div>
</div>
