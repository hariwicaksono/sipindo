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


<form class="form-horizontal" action="{{ asset('admin/konfigurasi/proses_email') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

<div class="row form-group">
  <label class="col-md-3 col-form-label text-right">Protocol Email</label>
  <div class="col-md-9">
    <input type="text" name="protocol" placeholder="Protocol Email" value="<?php echo $site->protocol ?>" required class="form-control">
</div>
</div>

<div class="row form-group">
  <label class="col-md-3 col-form-label text-right">SMTP Host</label>
  <div class="col-md-9">
    <input type="text" name="smtp_host" placeholder="SMTP Host" value="<?php echo $site->smtp_host ?>" class="form-control">
</div>
</div>

<div class="row form-group">
  <label class="col-md-3 col-form-label text-right">SMTP Port</label>
  <div class="col-md-9">
    <input type="number" name="smtp_port" placeholder="SMTP Port" value="<?php echo $site->smtp_port ?>" class="form-control">
</div>
</div>

<div class="row form-group">
  <label class="col-md-3 col-form-label text-right">SMTP Timeout</label>
  <div class="col-md-9">
    <input type="number" name="smtp_timeout" placeholder="SMTP Timeout" value="<?php echo $site->smtp_timeout ?>" class="form-control" required>
</div>
</div>


<div class="row form-group">
  <label class="col-md-3 col-form-label text-right">SMTP Username (Email)</label>
  <div class="col-md-9">
    <input type="email" name="smtp_user" placeholder="SMTP User" value="<?php echo $site->smtp_user ?>" class="form-control">
</div>
</div>

<div class="row form-group">
  <label class="col-md-3 col-form-label text-right">SMTP Password</label>
  <div class="col-md-9">
    <input type="text" name="smtp_pass" placeholder="SMTP Password" value="<?php echo $site->smtp_pass ?>" class="form-control">
</div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right"></label>
  <div class="col-md-9">
    <input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
</div>
</div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#mainKonfigurasiNav").addClass('menu-is-opening menu-open');
  $("#KonfigurasiNav").addClass('active');
  $("#konfigurasiEmail .nav-link").addClass('active');
    }); 
  </script>

