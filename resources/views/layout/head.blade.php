<?php 

$site = DB::table('konfigurasi')->first();
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@if (app()->isLocale('en')){{ $title_en ?? '' }}@else{{$title}}@endif | {{$site->namaweb}} - {{$site->tagline}}</title>
<meta name="description" content="{{ $deskripsi }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ $site->namaweb }}">
<!-- icon -->
<link rel="shortcut icon" href="{{ asset('uploads/image/'.$site->icon) }}">
<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
 <!-- Custom fonts for this template -->
  <link href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/assets/vendor/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/template/assets/css/style.css') }}" rel="stylesheet">
   <script src="{{ asset('assets/template/assets/vendor/jquery/jquery.min.js') }}"></script>
  <!-- JQUERY UI -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.css') }}">
  <script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/template/assets/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
  <script src="{{ asset('assets/template/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  
  <style type="text/css" media="screen">
   html, body {
     overflow-x: hidden;
   }

  </style>
  <?php echo $site->metatext; ?>
</head>

<body>