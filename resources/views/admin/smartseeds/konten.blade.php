

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
 
@include('admin/smartseeds/tambah')

<form action="{{ url('admin/smartseeds/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row mb-3">
  <div class="col-md-12">
    <div>
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
      <button id="btn-hapus" class="btn btn-danger" type="submit" name="hapus" onClick="return check();" disabled >
          <i class="fa fa-trash"></i> Hapus
      </button> 
        
   </div>
    </div>
</div>

    <div class="table-responsive table-main">
<table id="table1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%" class="text-center">
            <div class="table-controls icheck-primary">
                <!-- Check all button -->
                <input type="checkbox" id="check-all" class="btn btn-sm checkbox-toggle" />
               <label for="check-all"></label>
            </div>
        </th>
    <th>Fitur</th>
    <th>Gambar</th>
    <th>Posisi</th>
    <th width="10%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($site as $site) { ?>

        <td class="text-center">
        <div class="icheck-primary">
                  <input type="checkbox" class="icheckbox_flat-blue " name="id_smartseeds[]" value="<?php echo $site->id_smartseeds ?>" id="check<?php echo $i ?>">
                   <label for="check<?php echo $i ?>"></label>
        </div>
    </td>

</form>
    <td>
    <?=$site->fitur?>
    </td>
    <td>
    <img src="{{ asset('uploads/image/thumbs/'.$site->gambar) }}" class="img-fluid" width="100" >
    </td>
    <td>
    <?=$site->posisi?></td>
    <td>
        <div class="text-center">
        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $site->id_smartseeds ?>"><i class="fa fa-edit"></i></button>
          <a href="{{ url('admin/smartseeds/delete/'.$site->id_smartseeds) }}" class="btn btn-danger btn-xs delete-link">
            <i class="fa fa-trash"></i></a>
        </div>
        @include('admin/smartseeds/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#mainSmartseeds").addClass('menu-is-opening menu-open');
  $("#SmartseedsNav").addClass('active');
  $("#KontenSm .nav-link").addClass('active');
    }); 
  </script>