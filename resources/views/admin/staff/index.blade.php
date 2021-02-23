
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

@include('admin/staff/tambah')

<div class="row mb-3">
<div class="col-md-6">
<a href="{{ asset('admin/staff/tambah') }}" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
        <i class="fa fa-plus"></i> Tambah Baru</a> 
      
</div>
<div class="col-md-6">
<form action="{{ url('admin/staff/cari') }}" method="get" accept-charset="utf-8">
  <div class="input-group">

  <input type="text" name="keywords" class="form-control" placeholder="Pencarian" value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-append">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
        </span>    
  </div>
  </form>
</div>
</div>

<form action="{{ url('admin/staff/proses') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}
<div class="row">
  <div class="col-md-12">
    <div class="input-group">
    <span class="input-group-prepend" >
    <button id="btn-hapus" class="btn btn-default btn-md" type="submit" name="hapus" onClick="return check();" disabled>
          <i class="fa fa-trash text-danger"></i> Hapus
        </button>
        </span>

      <select name="id_kategori_staff" class="form-control form-control-md">
      <option value="">-- Ganti Kategori --</option>
        <?php foreach($kategori_staff as $kategori_staff) { ?>
          <option value="<?php echo $kategori_staff->id_kategori_staff ?>"><?php echo $kategori_staff->nama_kategori_staff ?></option>
        <?php } ?>
      </select>
      <span class="input-group-append" >
        <button id="btn-update" type="submit" class="btn btn-default btn-md" name="update" onClick="return check();" disabled><i class="fa fa-save text-primary"></i> Update</button> 
        
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
            <th width="30%">Nama</th>
            <th width="15%">Kategori</th>
            <th width="7%" class="text-center">Tampil</th>
            <th width="10%" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php $i=1; foreach($staff as $staff) { ?>

            <tr>
              <td class="text-center">
                <div class="icheck-primary">
                  <input type="checkbox" name="id_staff[]" value="<?php echo $staff->id_staff ?>" id="check<?php echo $i ?>">
                  <label for="check<?php echo $i ?>"></label>
                </div>
              </td>
              </form>
              <td><img src="{{ asset('uploads/image/staff/thumbs/'.$staff->gambar) }}" class="img-fluid" width="80"></td>
              <td><?php echo $staff->nama_staff ?>
                <small>
                  <br>Jabatan: <?php echo $staff->jabatan ?>
                  <br>Pendidikan: <?php echo $staff->pendidikan ?>
                  <br>Email: <?php echo $staff->email ?>
                  <br>Telepon: <?php echo $staff->telepon ?>
                </small>
              </td> 
              <td><a href="{{ url('admin/staff/kategori/'.$staff->id_kategori_staff) }}"><?php echo $staff->nama_kategori_staff ?></a></td>
              <td class="text-center"><a href="{{ url('admin/staff/status_staff/'.$staff->status_staff) }}">
                  <?php echo $staff->status_staff ?></a></td>
            
              <td>
                <div class="text-center">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Detail<?php echo $staff->id_staff ?>">
                <i class="fa fa-eye"></i>
                </button>
             
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $staff->id_staff ?>">
                    <i class="fa fa-edit"></i>
                </button>
                    <a href="{{ asset('admin/staff/delete/'.$staff->id_staff) }}" class="btn btn-danger btn-xs delete-link"><i class="fa fa-trash"></i> </a>
                </div>

                @include('admin/staff/detail')

                    @include('admin/staff/edit')
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
  $("#DataStaff .nav-link").addClass('active');
    }); 
  </script>
