<div class="table-responsive table-main">
<table id="table1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%"  class="text-center">
          ID
        </th>
        <th>Username</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>IP Address</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($log as $log) { ?>

        <td class="text-center">
        <?php echo $i?>
         </td>
      <td>
      <?php echo $log->username ?>
        </td>

    <td><?php echo $log->tanggal ?></td>
    <td><?php echo $log->keterangan ?></td>
    <td>
   <?php echo $log->ip_address ?>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      $("#menuLog .nav-link").addClass('active'); 
    }); 
  </script>