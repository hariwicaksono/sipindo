<?php  
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
<!--Inner Header Start-->
<div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en'))
         {{ $header_en }}
         @else
         {{ $header }}
         @endif</h1>
      </div>
            <img src="{{ asset('uploads/image/layanan/'.$read->gambar) }}">
         </div>
</div>
<!--Inner Header End--> 
<!--About Start-->
<section>
<!--About Txt Video Start-->
<div>
   <div class="container">
   @include('layout.breadcrumb') 
       

   <img src="{{ asset('uploads/image/layanan/'.$read->gambar) }}" alt="{{ $title }}" class="img img-fluid mb-3">
   <div class="row justify-content-center">
   <div class="col-lg-10">
   <h1 class="font-weight-bold">
   @if (app()->isLocale('en'))
         {{ $read->judul_layanan_en }}
         @else
         {{ $read->judul_layanan }}
         @endif
        </h1>

   @if (app()->isLocale('en'))
               <?=$read->isi_en ?>
         @else
         <?=$read->isi ?>
         @endif
     
      </div>

   </div>

   </div>
</div>
</section>
<!--About Txt Video End--> 



