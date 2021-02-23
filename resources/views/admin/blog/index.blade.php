
<div class="row mb-3">
<div class="col-md-6">
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
        </div>
  <div class="col-md-6">
    <form action="{{ asset('admin/blog/cari') }}" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci..." value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-append">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
        
      </span>
    </div>
    </form>
  </div>
</div>

@include('admin/blog/tambah')

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

<form action="{{ url('admin/blog/proses') }}" method="post" accept-charset="utf-8">
<input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
<?php $site   = DB::table('konfigurasi')->first(); ?>
{{ csrf_field() }}
<div class="row">
  <div class="col-md-12">

    <div class="input-group">
    <span class="input-group-prepend" >
      <button id="btn-hapus" class="btn btn-danger btn-md" type="submit" name="hapus" onClick="return check();" disabled>
          <i class="fa fa-trash"></i>
        </button> 
        </span>
      <select name="id_kategori" class="form-control form-control-md" disabled>
      <option value="">-- Ganti Kategori --</option>
        <?php 
        //$site           = DB::table('kategori')->get();
        //foreach($kategori as $kategori) { ?>
          <!--<option value="<?php //echo $kategori->id_kategori ?>"><?php //echo $kategori->nama_kategori ?></option>-->
        <?php //} ?>
      </select>
      <span class="input-group-append" >
        <button id="btn-updated" type="submit" class="btn btn-default btn-md" name="update" onClick="return check();" disabled><i class="fa fa-save text-primary"></i> Update</button>
        
        <button id="btn-draft" class="btn btn-default btn-md" type="submit" name="draft" onClick="return check();" disabled>
          <i class="fa fa-times text-warning"></i> Draft
        </button>

        <button id="btn-publish" class="btn btn-default btn-md" type="submit" name="publish" onClick="return check();" disabled>
          <i class="fa fa-check text-success"></i> Publish
        </button>
      </span>
    </div>
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
      <th>Judul Blog</th>
      <th class="text-center">Status</th>
      <th width="15%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($blog as $blog) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id_blog[]" value="{{ $blog->id_blog }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
</form>
    <td class="text-center">
    <?php $site   = DB::table('konfigurasi')->first(); if($blog->gambar!="") { ?>
      <a href="{{ asset('uploads/image/blog/'.$blog->gambar) }}" data-toggle="lightbox" data-title="">
      <img src="{{ asset('/uploads/image/blog/thumbs/'.$blog->gambar) }}" class="img-thumbnail" >
    </a>
      <?php }else{ ?>
      <img src="{{ asset('uploads/image/blog/thumbs/'.$site->icon) }}" class="img-thumbnail" >
      <?php } ?>
    </td>
    
    <td>
    <a href="{{ url('admin/blog/edit/'.$blog->id_blog) }}">
    <h6><?php echo $blog->judul_blog ?></h6>
    </a>
      <span>
        Penulis: <?php if(Request::segment(3)=="jenis_blog") {echo $blog->nama; }else{ ?>
    <a href="{{ asset('admin/blog/author/'.$blog->id_user) }}">
    <?php echo $blog->nama ?>
    </a>
  <?php } ?> | Kategori: <a href="{{ url('admin/blog/kategori/'.$blog->id_kategori) }}">
    <?php echo $blog->nama_kategori ?>
    </a>
        <br>Posted: <?php echo date('d M Y H:i: s',strtotime($blog->tanggal_post)) ?>
        <br>Published: <?php echo date('d M Y H:i: s',strtotime($blog->tanggal_publish)) ?>
      </span>
    </td>
    

    <td class="text-center"><a href="{{ asset('admin/blog/status_blog/'.$blog->status_blog) }}">
      <span class="<?php if($blog->status_blog=="Publish") { echo 'text-success'; }else{ echo 'text-warning'; } ?>">
        <i class="fa <?php if($blog->status_blog=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php //echo $blog->status_blog ?></span>
    </a></td>

    <td>
      <div class="text-center">
        <a href="{{ asset('blog/read/'.$blog->slug_blog) }}" 
        class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $blog->id_blog ?>">
            <i class="fa fa-edit"></i>
        </button>

        <a href="{{ asset('admin/blog/delete/'.$blog->id_blog.'/'.$blog->jenis_blog) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
      @include('admin/blog/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>


<script type="text/javascript">
    $(document).ready(function() {
  $("#mainBlog .nav-link").addClass('active');
    }); 
  </script>