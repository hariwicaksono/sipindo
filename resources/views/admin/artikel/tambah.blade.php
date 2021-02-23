 
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header py-2">

				<h6 class="modal-title" id="myModalLabel">Tambah Artikel</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">

<form class="form-horizontal" action="{{ asset('admin/artikel/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="jenis_artikel" value="Artikel">

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Judul Artikel</label>
  <div class="col-md-10">
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
					<input type="text" name="judul_artikel" class="form-control" placeholder="Judul Artikel" value="{{ old('judul_artikel') }}" required>
					</div>
					<div class="tab-pane fade" id="addjudulEN" role="tabpanel" aria-labelledby="addjudulEN-tab">
					<input type="text" name="judul_artikel_en" class="form-control" placeholder="Article Title" value="{{ old('judul_artikel_en') }}" required>
					</div>
					</div>

    
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Kategori</label>
  <div class="col-md-5">
    <select name="id_kategori" class="form-control">
       <option value="1">Artikel</option>
    </select>
  </div>
  <div class="col-md-5">
  <select name="id_font" class="form-control select2">
  <option>Pilih Font Judul</option>
  	<?php foreach($font as $font) { ?>
  	<option value="<?php echo $font->id_font ?>">
  	<?php echo $font->nama_font ?>/<?php echo $font->styles ?></option>
  	<?php } ?>
  </select>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Gambar &amp; Urutan</label>
  <div class="col-md-7">
    <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
  </div>
  <div class="col-md-3">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Ringkasan</label>
  <div class="col-md-10">
    <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)">{{ old('keywords') }}</textarea>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Isi Artikel</label> 
  <div class="col-md-10">
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
          <textarea name="isi" class="form-control textarea" placeholder="Isi Artikel">{{ old('isi') }}</textarea>
					</div>
					<div class="tab-pane fade" id="addketeranganEN" role="tabpanel" aria-labelledby="addketeranganEN-tab">
          <textarea name="isi_en" class="form-control textarea" placeholder="Article Content">{{ old('isi_en') }}</textarea>
					</div>
					</div>
   
  </div>
</div>

<div class="row form-group">
  <label class="col-md-2 col-form-label text-right">Status, Tanggal</label>
  <div class="col-md-2">
    <select name="status_artikel" class="form-control select2">
      <option value="Publish">Publikasikan</option>
      <option value="Draft">Simpan sebagai Draft</option>}
    </select>
  </div>
  <div class="col-md-2">
    <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-2">
    <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s'); } ?>">
  </div>
</div>

<!--<div class="row form-group">
  <label class="col-md-3 col-form-label text-right">Icon</label>
  <div class="col-md-6">
    <input type="text" name="icon" class="form-control" placeholder="Icon artikel/profil/layanan" value="{{ old('icon') }}">
    <small class="text-success">Icon menggunakan Fontawesome. Kunjungi <a href="https://fontawesome.com/" target="_blank">https://fontawesome.com/</a></small>
  </div>
</div>-->

<div class="row form-group">
  <label class="col-md-2 text-right"></label>
  <div class="col-md-10">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary "><i class="fa fa-save"></i> Simpan</button>
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