<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
 <style>
.map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}

</style>
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
<section class="contact-page">
   <div class="container content">
   @include('layout.breadcrumb') 
      <h4>{{__('lang.info-kontak')}}</h4>
      
      <div class="row">
         <!--Contact Info Start-->
         <div class="col-md-6">
            <div>
               <h5>{{__('lang.alamat')}}:</h5>
               <strong><?php echo $site_config->namaweb ?></strong>
               <?php echo nl2br($site_config->alamat) ?>
            </div>
         </div>
         <!--Contact Info End--> 
         <!--Contact Info Start-->
         <div class="col-md-6">
            <div>
               <h5>{{__('lang.kontak')}}:</h5>
               <p>Telepon: <?php echo $site_config->telepon ?>
                <br>Email: <?php echo $site_config->email ?>
                <br>Website: <?php echo $site_config->website ?></p>
            </div>
         </div>
         <!--Contact Info End--> 
         
      </div>

   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
         <div class="map-responsive">
               <?php echo $site_config->google_map ?>
            </div>
         </div>
      </div>
   </div>

</section>
<!--Contact End--> 