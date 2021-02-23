<?php 
$sek  = date('Y');
$awal = $sek-100;
?>

</div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- pace-progress -->
<script src="{{ asset('assets/admin/plugins/pace-progress/pace.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>

<script>
  $( ".datepicker" ).datepicker({
    inline: true,
    changeYear: true,
    changeMonth: true,
    dateFormat: "dd-mm-yy",
    yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y')+2; echo $tahundepan; ?>"
  });

  $( ".tanggal" ).datepicker({
    inline: true,
    changeYear: true,
    changeMonth: true,
    dateFormat: "dd-mm-yy",
    yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y')+2; echo $tahundepan; ?>"
  });

  $( ".tanggalan" ).datepicker({
    inline: true,
    changeYear: true, 
    changeMonth: true,
    dateFormat: "dd-mm-yy",
    yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y')+2; echo $tahundepan; ?>"
  });

</script>

<script>
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 5000
    });
    @if ($message = Session::get('sukses'))
    Toast.fire({
            icon: 'success',
            title: '<?php echo $message ?>.'
          })
    @endif

    @if ($message = Session::get('warning'))
    Toast.fire({
            icon: 'error',
            title: '<?php echo $message ?>.'
          })
    @endif

// Popup Delete
$(document).on("click", ".delete-link", function(e){
  e.preventDefault();
  url = $(this).attr("href");
  Swal.fire({
    title:"Yakin akan menghapus data ini?",
    icon: 'error',
    showCancelButton: true,
    buttonsStyling: false,
    customClass: {
    confirmButton: 'btn btn-primary mr-2',
    cancelButton: 'btn btn-danger',
    },
    confirmButtonText: "Hapus",
    cancelButtonText: "Tutup",
    showLoaderOnConfirm: true,
    preConfirm: function() {
    return new Promise(function(resolve) {
      $.ajax({
        url: url,
        success: function(resp){
          window.location.href = url;
        }
      });
      setTimeout(function() {
        resolve()
      }, 2000)
    })
  }
  },
  function(isConfirm){
    if(isConfirm){
     
    }
    return false;
  });
});
// Popup disable
$(document).on("click", ".disable-link", function(e){
  e.preventDefault();
  url = $(this).attr("href");
  Swal.fire({
    title:"Yakin akan menonaktifkan data ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: 'btn btn-danger',
    cancelButtonClass: 'btn btn-success',
    buttonsStyling: false,
    confirmButtonText: "Non Aktifkan",
    cancelButtonText: "Cancel",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
  },
  function(isConfirm){
    if(isConfirm){
      $.ajax({
        url: url,
        success: function(resp){
          window.location.href = url;
        }
      });
    }
    return false;
  });
});

// Popup approval
$(document).on("click", ".approval-link", function(e){
  e.preventDefault();
  url = $(this).attr("href");
  Swal.fire({
    title:"Anda yakin ingin menyetujui data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonClass: 'btn btn-danger',
    cancelButtonClass: 'btn btn-success',
    buttonsStyling: false,
    confirmButtonText: "Ya, Setujui",
    cancelButtonText: "Cancel",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
  },
  function(isConfirm){
    if(isConfirm){
      $.ajax({
        url: url,
        success: function(resp){
          window.location.href = url;
        }
      });
    }
    return false;
  });
});
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<!-- Page Script -->
<script>
  $(function () {
    $(document).ready(function() {
        $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    });

    //checkbox x toolbar btn
    $(function() {
    $('#check-all').click(function() {
        if ($(this).is(':checked')) {
          $('#btn-hapus').removeAttr('disabled');
          $('#btn-update').removeAttr('disabled');
          $('#btn-draft').removeAttr('disabled');
          $('#btn-publish').removeAttr('disabled');
        } else {
          $('#btn-hapus').attr('disabled', 'disabled');
          $('#btn-update').attr('disabled', 'disabled');
          $('#btn-draft').attr('disabled', 'disabled');
          $('#btn-publish').attr('disabled', 'disabled');
        }
    });
  });

  var checkboxes = $(".icheck-primary input[type='checkbox']"),
    btnHapus = $("#btn-hapus");
    btnUpdate = $("#btn-update");
    btnDraft = $("#btn-draft");
    btnPublish = $("#btn-publish");

  checkboxes.click(function() {
    btnHapus.attr("disabled", !checkboxes.is(":checked"));
    btnUpdate.attr("disabled", !checkboxes.is(":checked"));
    btnDraft.attr("disabled", !checkboxes.is(":checked"));
    btnPublish.attr("disabled", !checkboxes.is(":checked"));
  });

    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
    
    $('.mselect2').select2({
      dropdownParent: $('.Tambah')
    });
   
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.table-main input[type=\'checkbox\']').prop('checked', false)
        
      } else {
        //Check all checkboxes
        $('.table-main input[type=\'checkbox\']').prop('checked', true)
       
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
<!-- page script -->
<script>
  $(function () {
    $("#table1").DataTable();
    $('#table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    $('#table3').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  </script>
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'api/artikel/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'judul_artikel', name: 'judul_artikel' },
            { data: 'jenis_artikel', name: 'jenis_artikel' },
            { data: 'status_artikel', name: 'status_artikel' },
            { data: 'tanggal_publish', name: 'tanggal_publish' }
        ]
    });
});
</script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
  })
</script>

</body>
</html>