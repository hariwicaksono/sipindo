
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

<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>
@include('admin/header/tambah')

<table class="table table-bordered" id="table1">
<thead>
<tr>
    <th width="5%">No</th>
    <th width="10%">Gambar</th>
    <th>Judul</th>
    <th>Keterangan</th>
    <th>Halaman</th>
    <th width="10%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($header as $header) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td class="text-center">
      <?php if($header->gambar=="") { echo '-';}else{ ?>
        <img src="{{ asset('uploads/image/thumbs/'.$header->gambar) }}" class="img img-fluid img-thumbnail" style="width: 100px; height: auto;">
      <?php } ?>
    </td>
    <td><?php echo $header->judul_header ?></td>
    <td><small><?php echo $header->keterangan ?></small></td>
    <td><?php echo $header->halaman ?></td>
    <td>
      <div class="text-center">
      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $header->id_header ?>">
    <i class="fa fa-edit"></i>
</button>
      <a href="{{ url('admin/header/delete/'.$header->id_header) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a> 
      </div>
      @include('admin/header/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
      $("#menuHeader .nav-link").addClass('active'); 
    }); 
  </script>