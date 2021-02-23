<div class="row mb-3">
  <div class="col-md-6">
  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
        </div>
  <div class="col-md-6">
    <form action="{{ url('admin/video/cari') }}" method="get" accept-charset="utf-8">
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Pencarian" value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" >
      <span class="input-group-append">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
      </span>
    </div>
    </form>
  </div>

</div>

@include('admin/video/tambah')

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

<form action="{{ url('admin/video/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div>

    <div class="input-group">
      <span class="input-group-prepend" >
        <button id="btn-hapus" class="btn btn-danger btn-md" type="submit" name="hapus" onClick="return check();" disabled>
        <i class="far fa-check-square"></i> Hapus
        </button> 
      </span>
      <select name="is_live" class="form-control form-control-md">
      <option>Live Steraming?</option>
      <option value="yes">Ya, Live</option>
			<option value="no">Bukan</option>
      </select>
      <span class="input-group-append">
        <button id="btn-update" type="submit" class="btn btn-default btn-md" name="update" onClick="return check();" disabled><i class="far fa-save text-primary"></i> Update</button> 

        <button id="btn-draft"  class="btn btn-default btn-md" type="submit" name="draft" onClick="return check();" disabled>
          <i class="fa fa-times text-warning"></i> Tidak Aktif
        </button>

        <button id="btn-publish"  class="btn btn-default btn-md" type="submit" name="publish" onClick="return check();" disabled>
          <i class="fa fa-check text-success"></i> Aktif
        </button>
      </span>
    </div>

</div>

    <div class="table-responsive table-main">
<table class="display table table-bordered table-sm" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%" class="text-center">
            <div class="table-controls icheck-primary">
                <!-- Check all button -->
                <input type="checkbox" id="check-all" class="btn btn-sm checkbox-toggle" />
               <label for="check-all"></label>
            </div>
        </th>
    <th>Video</th>
    <th>Judul</th>
    <th>Keterangan</th>
    <th>Posisi</th>
    <th>Status</th>
    <th>Live</th>
    <th width="10%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($video as $video) { ?>

        <td class="text-center">
        <div class="icheck-primary">
        <input type="checkbox" name="id_video[]" value="<?php echo $video->id_video ?>" id="check<?php echo $i ?>">
                  <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
  </form>

      <td>
        <a href="https://www.youtube.com/watch?{{ $video->video }}" target="_blank" alt="">https://www.youtube.com/watch?{{ $video->video }}</a>
      
        <?php $site   = DB::table('konfigurasi')->first(); if($video->gambar!="") { ?>
      <img src="{{ asset('uploads/image/video/thumbs/'.$video->gambar) }}" class="img-thumbnail img-fluid" >
      <?php }else{ ?>
      <img src="{{ asset('uploads/image/nophoto.png') }}" class="img-thumbnail img-fluid" >
      <?php } ?>
    </td>
  
    <td><?php echo $video->judul ?></td>
    <td><small><?php echo $video->keterangan ?></small></td>
    <td><?php echo $video->posisi ?></td>
    <td class="text-center">
    <a href="#" data-toggle="tooltip" data-placement="left" title="<?php echo $video->aktif=="1"? "Aktif":"Tidak Aktif" ;?>">
      <span class="<?php if($video->aktif=="1") { echo 'text-success'; }else{ echo 'text-warning'; } ?>">
        <i class="fa <?php if($video->aktif=="1") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i>
      </span>
    </a>
    </td>
    <td><?php echo $video->live ?></td>
    <td>
        <div class="text-center">
        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $video->id_video ?>">
            <i class="fa fa-edit"></i>
        </button>
          <a href="{{ asset('admin/video/delete/'.$video->id_video) }}" class="btn btn-danger btn-xs delete-link">
            <i class="fa fa-trash"></i></a>
        </div>
        @include('admin/video/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

<div class="float-sm-right">
    {{ $videos->links() }}
    </div>

<script type="text/javascript">
    $(document).ready(function() {
      $("#menuVideo .nav-link").addClass('active'); 
    }); 
  </script>