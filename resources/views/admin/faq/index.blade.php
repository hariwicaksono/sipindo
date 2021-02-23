
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
 
@include('admin/faq/tambah')

<form action="{{ asset('admin/faq/proses') }}" method="post" accept-charset="utf-8">
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
    <th>Pertanyaan</th>
    <th>Jawaban</th>
    <th width="10%" class="text-center">Aksi</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($faq as $faq) { ?>

        <td class="text-center">
        <div class="icheck-primary">
                  <input type="checkbox" class="icheckbox_flat-blue " name="id_faq[]" value="<?php echo $faq->id_faq ?>" id="check<?php echo $i ?>">
                   <label for="check<?php echo $i ?>"></label>
        </div>
    </td>

</form>
    <td><?php echo $faq->pertanyaan ?></td>
    <td>
    <?php echo \Illuminate\Support\Str::limit(strip_tags($faq->jawaban), 200, $end='...') ?>
    <td>
        <div class="text-center">
        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit<?php echo $faq->id_faq ?>"><i class="fa fa-edit"></i></button>
          <a href="{{ asset('admin/faq/delete/'.$faq->id_faq) }}" class="btn btn-danger btn-xs delete-link">
            <i class="fa fa-trash"></i></a>
        </div>
        @include('admin/faq/edit')
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
  $("#FaqSip .nav-link").addClass('active');
    }); 
  </script>