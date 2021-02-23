<div class="row mb-3">
  <div class="col-md-6">
  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
</div>
<div class="col-md-6">
    <form action="{{ asset('admin/artikel/cari') }}" method="get" accept-charset="utf-8">
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

@include('admin/artikel/tambah')

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

<form action="{{ asset('admin/artikel/proses') }}" method="post" accept-charset="utf-8">
<input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
<?php $site   = DB::table('konfigurasi')->first(); ?>
{{ csrf_field() }}

<div>
  <div class="input-group">
    <span class="input-group-prepend" >
      <button id="btn-hapus" class="btn btn-danger btn-md" type="submit" name="hapus" onClick="return check();" disabled>
        <i class="far fa-check-square"></i> Hapus
        </button> 
        </span>
      <select name="id_kategori" class="form-control form-control-md">
      <option>--Pilih--</option>
        <?php 
        //$site           = DB::table('kategori')->get();
        //foreach($kategori as $kategori) { ?>
         <!-- <option value="<?php //echo $kategori->id_kategori ?>"><?php //echo $kategori->nama_kategori ?></option>-->
        <?php //} ?>
      </select>
      <span class="input-group-append" >
        <button id="btn-updated"  type="submit" class="btn btn-default btn-md" name="update" disabled><i class="far fa-save text-primary"></i> Update</button>
 
        <button id="btn-draft"  class="btn btn-default btn-md" type="submit" name="draft" onClick="return check();" disabled>
          <i class="fa fa-times text-warning"></i> Draft
        </button>

        <button id="btn-publish"  class="btn btn-default btn-md" type="submit" name="publish" onClick="return check();" disabled>
          <i class="fa fa-check text-success"></i> Publish
        </button>
      </span>
    </div>
</div>
 
<div class="table-responsive table-main">
<table class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr>
      <th width="5%" class="text-center">
            <div class="table-controls icheck-primary">
                <!-- Check all button -->
               <input type="checkbox" id="check-all" class="btn btn-sm checkbox-toggle" />
               <label for="check-all"></label>
            </div>
      </th>
      <th width="5%">Gambar</th>
      <th>Judul</th>
      <th class="text-center">Status</th>
      <th width="15%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($artikel as $artikel) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id_artikel[]" value="{{ $artikel->id_artikel }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
</form>
    <td class="text-center">
    <?php $site   = DB::table('konfigurasi')->first(); if($artikel->gambar!="") { ?>
      <a href="{{ asset('uploads/image/artikel/'.$artikel->gambar) }}" data-toggle="lightbox" data-title="">
      <img src="{{ asset('uploads/image/artikel/thumbs/'.$artikel->gambar) }}" class="img-thumbnail img-fluid" >
        </a>
      
      <?php }else{ ?>
      <img src="{{ asset('uploads/image/thumbs/'.$site->icon) }}" class="img-thumbnail img-fluid" >
      <?php } ?>
    </td>
    
    <td>
    <a href="{{ url('admin/artikel/edit/'.$artikel->id_artikel) }}">
    <h6><?php echo $artikel->judul_artikel ?></h6>
    </a>
      <span>
      Penulis: <?php if(Request::segment(3)=="jenis_artikel") {echo $artikel->nama; }else{ ?>
          <a href="{{ url('admin/artikel/author/'.$artikel->id_user) }}">
          <?php echo $artikel->nama ?>
          </a>
        <?php } ?> | 
        Kategori: <a href="{{ url('admin/artikel/kategori/'.$artikel->id_kategori) }}">
    <?php echo $artikel->nama_kategori ?>
    </a>
        <br>Posted: <?php echo date('d M Y H:i: s',strtotime($artikel->tanggal_post)) ?> | Published: <?php echo date('d M Y H:i: s',strtotime($artikel->tanggal_publish)) ?>
        <!--<?php //if($artikel->jenis_artikel=="Promo") { ?>
          <br>Promo: <span class="text-danger"><strong><?php //echo date('d M Y',strtotime($artikel->tanggal_mulai)) ?> s/d <?php //echo date('d M Y ',strtotime($artikel->tanggal_selesai)) ?></strong></span>
        <?php //} ?>-->
        </span>
    </td>

    <td class="text-center"><a href="{{ url('admin/artikel/status_artikel/'.$artikel->status_artikel) }}" data-toggle="tooltip" data-placement="left" title="<?php echo $artikel->status_artikel ?>">
      <span class="<?php if($artikel->status_artikel=="Publish") { echo 'text-success'; }else{ echo 'text-warning'; } ?>">
        <i class="fa <?php if($artikel->status_artikel=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php //echo $artikel->status_artikel ?></span>
    </a></td>
    <td>
      <div class="text-center">
        <a href="{{ url('artikel/read/'.$artikel->slug_artikel) }}" 
        class="btn btn-default btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Edit<?php echo $artikel->id_artikel ?>"><i class="fa fa-edit"></i></button>

        <a href="{{ url('admin/artikel/delete/'.$artikel->id_artikel) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
      @include('admin/artikel/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

<div class="float-sm-right">
    {{ $artikels->links() }}
    </div>


<script type="text/javascript">
    $(document).ready(function() {
  $("#menuArtikel .nav-link").addClass('active');
    }); 
  </script>
  