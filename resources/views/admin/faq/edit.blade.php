
<div class="modal fade" id="Edit<?php echo $faq->id_faq ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Edit Data FAQ</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
 
<form class="form-horizontal" action="{{ url('admin/faq/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_faq" value="<?php echo $faq->id_faq ?>">
<div class="form-group row">
	<label class="col-sm-2 col-form-label text-right">Pertanyaan</label>
	<div class="col-sm-10">

	<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<a class="nav-link active" id="edittanyaID-tab" data-toggle="tab" href="#edittanyaID" role="tab" aria-controls="edittanyaID" aria-selected="true">ID</a>
	</li>
	<li class="nav-item" role="presentation">
		<a class="nav-link" id="edittanyaEN-tab" data-toggle="tab" href="#edittanyaEN" role="tab" aria-controls="edittanyaEN" aria-selected="false">EN</a>
	</li>
	</ul>
	<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="edittanyaID" role="tabpanel" aria-labelledby="edittanyaID-tab">
	<input type="text" name="pertanyaan" class="form-control" placeholder="Pertanyaan" value="<?php echo $faq->pertanyaan ?>" required>
	</div>
	<div class="tab-pane fade" id="edittanyaEN" role="tabpanel" aria-labelledby="edittanyaEN-tab">
	<input type="text" name="pertanyaan_en" class="form-control" placeholder="Question" value="<?php echo $faq->pertanyaan_en ?>">
	</div>
	</div>
	
	</div>
</div>
 
<div class="form-group row">
	<label class="col-sm-2 col-form-label text-right">Jawaban</label>
	<div class="col-sm-10">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="editjawabID-tab" data-toggle="tab" href="#editjawabID" role="tab" aria-controls="editjawabID" aria-selected="true">ID</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="editjawabEN-tab" data-toggle="tab" href="#editjawabEN" role="tab" aria-controls="editjawabEN" aria-selected="false">EN</a>
		</li>
		</ul>
		<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="editjawabID" role="tabpanel" aria-labelledby="editjawabID-tab">
		<textarea name="jawaban" class="form-control textarea" placeholder="Jawaban"><?php echo $faq->jawaban ?></textarea>
		</div>
		<div class="tab-pane fade" id="editjawabEN" role="tabpanel" aria-labelledby="editjawabEN-tab">
		<textarea name="jawaban_en" class="form-control textarea" placeholder="Jawaban"><?php echo $faq->jawaban_en ?></textarea>
		</div>
		</div>
	
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-2 text-right"></label>
	<div class="col-sm-10">
		<div class="form-group pull-right">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan">
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</form>

</div>
</div>
</div>
</div>