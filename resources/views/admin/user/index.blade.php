
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

@include('admin/user/tambah')
<form action="{{ url('admin/user/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row mb-3">

  <div class="col-md-12">
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
   </div>
</div>
</div>

    <div class="table-responsive table-main">
<table id="table1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%" class="text-center">
          ID
        </th>
        <th width="10%">Foto</th>
        <th>Nama / Username</th>
        <th>Email</th>
        <th>Hak Akses</th>
        <th width="15%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($user as $user) { ?>

        <td class="text-center">
        <?php echo $user->id_user ?>
    </td>
      <td class="text-center">
        <?php if($user->gambar != "") { ?>
            <img src="{{ asset('uploads/user/thumbs/'.$user->gambar) }}" class="img-fluid img-thumbnail" width="100">
        <?php }else{ echo '<img src="../public/uploads/user/ava.jpg" class="img-fluid img-thumbnail" width="100">'; } ?>
    </td>
</form>
    <td><?php echo $user->nama ?><br/><?php echo $user->username ?></td>
    <td><?php echo $user->email ?></td>
    <td>
    <div class="badge badge-primary"><?php echo $user->akses_level ?></div>
    </td>
    <td>
        <div class="text-center">
        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $user->id_user ?>">
            <i class="fa fa-edit"></i>
        </button>
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditPasswd<?php echo $user->id_user ?>">
            <i class="fa fa-lock"></i>
        </button>

        <?php if(Session()->get('username') == $user->username) { ?>
            <a href="#" class="btn btn-danger btn-xs">
            <i class="fa fa-trash"></i>
            </a>
     <?php } else { ?> 
        <a href="{{ url('admin/user/delete/'.$user->id_user) }}" class="btn btn-danger btn-xs delete-link">
            <i class="fa fa-trash"></i>
            </a>
     <?php } ?>

        

        </div>
        @include('admin/user/edit')

        @include('admin/user/password')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      $("#menuUser .nav-link").addClass('active'); 
    }); 
  </script>