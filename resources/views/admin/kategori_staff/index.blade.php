<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>
@include('admin/kategori_staff/tambah')

<div class="table-responsive">
<table class="table table-bordered" id="table1" cellspacing="0" width="100%">
<thead>
<tr>
    <th width="5%" class="text-center">No</th>
    <th width="40%">Nama Kategori</th>
    <th width="15%">Keterangan</th>
    <th width="15%">Slug</th>
    <th width="10%" class="text-center">No. Urut</th>
    <th class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_staff as $kategori_staff) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_staff->nama_kategori_staff ?></td>
    <td><?php echo $kategori_staff->keterangan ?></td>
    <td><?php echo $kategori_staff->slug_kategori_staff ?></td>
    <td class="text-center"><?php echo $kategori_staff->urutan ?></td>
    <td> 
<div class="text-center">
      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $kategori_staff->id_kategori_staff ?>">
    <i class="fa fa-edit"></i>
</button>
      <a href="{{ url('admin/kategori_staff/delete/'.$kategori_staff->id_kategori_staff) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
</div>
      @include('admin/kategori_staff/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#mainSipindo").addClass('menu-is-opening menu-open');
  $("#SipindoNav").addClass('active');
  $("#KategoriStaff .nav-link").addClass('active');
    }); 
  </script>