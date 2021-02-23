
@if ($errors->any())
    <div class="callout callout-danger py-2">
    <h6 class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h6>
        <ul class="mb-0 text-secondary">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>

@include('admin/kategori_galeri/tambah')

<div class="table-responsive">
<table class="table table-bordered" id="table1" cellspacing="0" width="100%">
<thead>
<tr>
    <th width="5%">No.</th>
    <th width="25%">Nama Kategori</th>
    <th width="25%">Slug</th>
    <th width="10%">No.Urut</th>
    <th width="10%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_galeri as $kategori_galeri) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_galeri->nama_kategori_galeri ?></td>
    <td><?php echo $kategori_galeri->slug_kategori_galeri ?></td>
    <td class="text-center"><?php echo $kategori_galeri->urutan ?></td>
    <td>
      <div class="text-center">
      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $kategori_galeri->id_kategori_galeri ?>">
    <i class="fa fa-edit"></i>
</button>
      <a href="{{ url('admin/kategori_galeri/delete/'.$kategori_galeri->id_kategori_galeri) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
      @include('admin/kategori_galeri/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#mainGaleriNav").addClass('menu-is-opening menu-open');
  $("#GaleriNav").addClass('active');
  $("#KategoriGaleri.nav-link").addClass('active');
    }); 
  </script>