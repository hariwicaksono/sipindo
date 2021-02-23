
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

@include('admin/fonts/tambah')
<form action="{{ url('admin/font/proses') }}" method="post" accept-charset="utf-8">
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
        <th width="5%"  class="text-center">
          ID
        </th>
        <th>Nama</th>
        <th>Styles</th>
        <th>Sample</th>
        <th width="10%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($font as $font) { ?>

        <td class="text-center">
        <?php echo $font->id_font ?>
    </td>

</form>
    <td><?php echo $font->nama_font ?></td>
    <td><?php echo $font->styles ?></td>
    <td>
    
    </td>
    <td>
        <div class="text-center">
        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $font->id_font ?>">
            <i class="fa fa-edit"></i>
        </button>

        <a href="{{ url('admin/fonts/delete/'.$font->id_font) }}" class="btn btn-danger btn-xs delete-link">
            <i class="fa fa-trash"></i>
            </a>
        

        </div>
        @include('admin/fonts/edit')

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>


<script type="text/javascript">
    $(document).ready(function() {
  $("#menuFont .nav-link").addClass('active');
    }); 
  </script>