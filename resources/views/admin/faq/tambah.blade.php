
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header py-2">
 
				<h6 class="modal-title" id="myModalLabel">Tambah FAQ</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ asset('admin/faq/proses_tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				{{ csrf_field() }}

				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label text-right">Pertanyaan</label>
					<div class="col-sm-10">

						<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="addtanyaID-tab" data-toggle="tab" href="#addtanyaID" role="tab" aria-controls="addtanyaID" aria-selected="true">ID</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="addtanyaEN-tab" data-toggle="tab" href="#addtanyaEN" role="tab" aria-controls="addtanyaEN" aria-selected="false">EN</a>
						</li>
						</ul>
						<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="addtanyaID" role="tabpanel" aria-labelledby="addtanyaID-tab">
						<input type="text" name="pertanyaan" class="form-control" placeholder="Pertanyaan" value="{{ old('pertanyaan') }}" required>
						</div>
						<div class="tab-pane fade" id="addtanyaEN" role="tabpanel" aria-labelledby="addtanyaEN-tab">
						<input type="text" name="pertanyaan_en" class="form-control" placeholder="Question" value="{{ old('pertanyaan_en') }}">
						</div>
						</div>
						
					</div>
				</div>
				

				<div class="form-group row">
					<label class="col-sm-2 col-form-label text-right">Jawaban</label>
					<div class="col-sm-10">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="addjawabID-tab" data-toggle="tab" href="#addjawabID" role="tab" aria-controls="addjawabID" aria-selected="true">ID</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="addjawabEN-tab" data-toggle="tab" href="#addjawabEN" role="tab" aria-controls="addjawabEN" aria-selected="false">EN</a>
						</li>
						</ul>
						<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="addjawabID" role="tabpanel" aria-labelledby="addjawabID-tab">
						<textarea name="jawaban" class="form-control textarea" placeholder="Jawaban">{{ old('jawaban') }}</textarea>
						</div>
						<div class="tab-pane fade" id="addjawabEN" role="tabpanel" aria-labelledby="addjawabEN-tab">
						<textarea name="jawaban_en" class="form-control textarea" placeholder="Jawaban">{{ old('jawaban_en') }}</textarea>
						</div>
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
