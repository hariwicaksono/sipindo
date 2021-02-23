<div class="row mb-3">
<div class="col-md-6">
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
    </div>
  <div class="col-md-6">
    <form  action="{{ asset('admin/layanan/cari') }}" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Pencarian" value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-append">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
      </span>
    </div>
    </form>
  </div>
  
</div>
 
@include('admin/layanan/tambah')

@if ($errors->any())
    <div class="callout callout-danger py-2">
    <h6 class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h6>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<form action="{{ asset('admin/layanan/proses') }}" method="post" accept-charset="utf-8">
<input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
<?php $site   = DB::table('konfigurasi')->first(); ?>
{{ csrf_field() }}
<div class="mb-0">
    <div class="input-group">
    <span class="input-group-prepend" >
   

      <button id="btn-hapus" class="btn btn-danger btn-md" type="submit" name="hapus" onClick="return check();" disabled>
        <i class="far fa-check-square"></i> Hapus
        </button> 
        </span>
      <select name="id_kategori" class="form-control form-control-md">
      <option value="">-- Ganti Kategori --</option>
        <?php 
        $site           = DB::table('kategori')->get();
        foreach($kategori as $kategori) { ?>
          <option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
        <?php } ?>
      </select>
      <span class="input-group-append" >
        <button id="btn-update" type="submit" class="btn btn-default btn-md" name="update" disabled><i class="far fa-save text-primary"></i> Update</button>
 
        <button id="btn-draft" class="btn btn-default btn-md" type="submit" name="draft" onClick="return check();" disabled>
          <i class="fa fa-times text-warning"></i> Draft
        </button>

        <button id="btn-publish" class="btn btn-default btn-md" type="submit" name="publish" onClick="return check();" disabled>
          <i class="fa fa-check text-success"></i> Publish
        </button>
      </span>
    </div>
</div>
	
<div class="table-responsive table-main">
<table class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr>
      <th width="5%">
            <div class="table-controls icheck-primary">
                <!-- Check all button -->
               <input type="checkbox" id="check-all" class="btn btn-sm checkbox-toggle" />
               <label for="check-all"></label>
            </div>
      </th>
      <th width="5%">Gambar</th>
      <th width="40%">Judul</th>
      <?php if(Request::segment(3)=="jenis_layanan") { ?>
      <?php }else{ ?>
        <th width="5%" class="text-center">Kategori</th>
      <?php } ?>
      <th width="5%" class="text-center">Status</th>
      <th width="15%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($layanan as $layanan) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id_layanan[]" value="{{ $layanan->id_layanan }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    </form>
    <td class="text-center">
    <?php $site   = DB::table('konfigurasi')->first(); if($layanan->gambar!="") { ?>
      <a href="{{ asset('uploads/image/layanan/thumbs/'.$layanan->gambar) }}" data-toggle="lightbox" data-title="">
      <img src="{{ asset('uploads/image/layanan/thumbs/'.$layanan->gambar) }}" class="img-thumbnail img-size-50 mr-2" >
        </a>
      
      <?php }else{ ?>
      <img src="{{ asset('uploads/image/thumbs/'.$site->icon) }}" class="img-thumbnail img-size-50 mr-2" >
      <?php } ?>
    </td>
    
    <td>
    <a href="{{ url('admin/layanan/edit/'.$layanan->id_layanan) }}">
    <h6><?php echo $layanan->judul_layanan ?></h6>
    </a>
      <small>
      Penulis: <?php if(Request::segment(3)=="jenis_layanan") {echo $layanan->nama; }else{ ?>
          <a href="{{ url('admin/layanan/author/'.$layanan->id_user) }}">
          <?php echo $layanan->nama ?>
          </a>
        <?php } ?>
        <br>Posted: <?php echo date('d M Y H:i: s',strtotime($layanan->tanggal_post)) ?>
        <br>Published: <?php echo date('d M Y H:i: s',strtotime($layanan->tanggal_publish)) ?>
        <?php if($layanan->jenis_layanan=="Promo") { ?>
          <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y',strtotime($layanan->tanggal_mulai)) ?> s/d <?php echo date('d M Y ',strtotime($layanan->tanggal_selesai)) ?></strong></span>
        <?php } ?>
      </small>
    </td>
     
  <?php if(Request::segment(3)=="jenis_layanan") {}else{ ?>
    <td class="text-center">
    <a href="{{ url('admin/layanan/kategori/'.$layanan->id_kategori) }}">
    <?php echo $layanan->nama_kategori ?>
    </a>
    </td>
  <?php } ?>
    <td class="text-center"><a href="{{ url('admin/layanan/status_layanan/'.$layanan->status_layanan) }}" data-toggle="tooltip" title="<?php echo $layanan->status_layanan ?>">
      <span class="<?php if($layanan->status_layanan=="Publish") { echo 'text-success'; }else{ echo 'text-warning'; } ?>">
        <i class="fa <?php if($layanan->status_layanan=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php //echo $layanan->status_layanan ?></span>
    </a></td>
    <td>
      <div class="text-center">
        <a href="{{ url('solusi-kami/'.$layanan->slug_layanan) }}" 
        class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $layanan->id_layanan ?>"><i class="fa fa-edit"></i></button>

        <a href="{{ url('admin/layanan/delete/'.$layanan->id_layanan) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
      @include('admin/layanan/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

<div class="float-sm-right">
    {{ $layanans->links() }}
        </div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#mainSipindo").addClass('menu-is-opening menu-open');
  $("#SipindoNav").addClass('active');
  $("#LayananSip .nav-link").addClass('active');
    }); 
  </script>