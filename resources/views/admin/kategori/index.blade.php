<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button> 
@include('admin/kategori/tambah')

<div class="table-responsive">
<table id="table1" class="display table table-bordered"  cellspacing="0" width="100%">
<thead>
<tr>
    <th width="5%" class="text-center" scope="col">No</th>
    <th width="25%" scope="col">Nama Kategori</th>
    <th width="10%" scope="col">Slug</th>
    <th width="5%" class="text-center" scope="col">No Urut</th>
    <th width="10%" class="text-center" scope="col">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori as $kategori) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori->nama_kategori ?></td>
    <td><?php echo $kategori->slug_kategori ?></td>
    <td class="text-center"><?php echo $kategori->urutan ?></td>
    <td>
      <div class="text-center">
      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $kategori->id_kategori ?>">
    <i class="fa fa-edit"></i>
</button>
      <a href="{{ asset('admin/kategori/delete/'.$kategori->id_kategori) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
      @include('admin/kategori/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table> 
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $("#menuKategori .nav-link").addClass('active'); 
    }); 
  </script>