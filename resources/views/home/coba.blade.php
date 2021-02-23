<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>

<!--Inner Header Start-->
<div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en')){{ $header_en ?? '' }}@else{{$header}}@endif</h1>
</div>
      <img src="{{ asset('uploads/image/'.$bg->gambar) }}">
   </div>
</div>
<!--Inner Header End--> 
<!--Contact Start-->
<section>
   <div class="container content">
   @include('layout.breadcrumb') 

   </div>

</section>
<!--Contact End--> 