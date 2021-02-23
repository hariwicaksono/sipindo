<div class="row mb-3">
  <div class="col-md-6">
  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
        </div>
  <div class="col-md-6">
    <form action="{{ url('admin/galeri/cari') }}" method="get" accept-charset="utf-8">
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Pencarian" value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" >
      <span class="input-group-append">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
      </span>
    </div>
    </form>
  </div>

</div>

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

@include('admin/galeri/tambah')

<form action="{{ url('admin/galeri/proses') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}
<div>

    <div class="input-group">
      <span class="input-group-prepend" >
        <button id="btn-hapus" class="btn btn-danger btn-md" type="submit" name="hapus" onClick="return check();" disabled>
        <i class="far fa-check-square"></i> Hapus
        </button> 
      </span>
      <select name="id_kategori_galeri" class="form-control form-control-md">
      <option>Ganti Kategori</option>
        <?php foreach($kategori_galeri as $kategori_galeri) { ?>
          <option value="<?php echo $kategori_galeri->id_kategori_galeri ?>"><?php echo $kategori_galeri->nama_kategori_galeri ?></option>
        <?php } ?>
      </select>
      <span class="input-group-append">
        <button id="btn-update" type="submit" class="btn btn-default btn-md" name="update" onClick="return check();" disabled><i class="far fa-save text-primary"></i> Update</button> 
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
            <th width="8%">Gabar</th>
            <th width="40%">Judul</th>
            <th width="15%">Kategori</th>
            <th width="10%">Jenis</th>
            <th width="10%">Tampil Teks</th>
            <th width="10%" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php $i=1; foreach($galeri as $galeri) { ?>

            <tr>
              <td class="text-center">
                <div class="icheck-primary">
                  <input type="checkbox" name="id_galeri[]" value="<?php echo $galeri->id_galeri ?>" id="check<?php echo $i ?>">
                  <label for="check<?php echo $i ?>"></label>
                </div>
              </td>
      </form>
              <td>
              <a href="{{ asset('uploads/image/gallery/'.$galeri->gambar) }}" data-toggle="lightbox" data-title="">
            <img src="{{ asset('uploads/image/gallery/thumbs/'.$galeri->gambar) }}" class="img-fluid" >
              </a>  
              
              </td>
              <td><?php echo $galeri->judul_galeri ?></td>
              <td><a href="{{ url('admin/galeri/kategori/'.$galeri->id_kategori_galeri) }}"><?php echo $galeri->nama_kategori_galeri ?></a></td>
              <td><a href="{{ url('admin/galeri/status_galeri/'.$galeri->jenis_galeri) }}">
                  <?php echo $galeri->jenis_galeri ?></a></td>
              <td class="text-center">{{ $galeri->status_text }}</td>
              <td >
                    <div class="text-center">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $galeri->id_galeri ?>"><i class="fa fa-edit "></i></button>
                      
                          <a href="{{ url('admin/galeri/delete/'.$galeri->id_galeri) }}" class="btn btn-danger btn-xs delete-link"><i class="fa fa-trash"></i></a>
                        </div>
                        @include('admin/galeri/edit')
                      </td>
                    </tr>

                    <?php $i++; } ?>

                  </tbody>
                </table>
              </div>
              <div class="float-sm-right">
    {{ $galeris->links() }}
    </div>
       

    <script type="text/javascript">
    $(document).ready(function() {
        $("#mainGaleriNav").addClass('menu-is-opening menu-open');
  $("#GaleriNav").addClass('active');
  $("#DataGaleri.nav-link").addClass('active');
    }); 
  </script>