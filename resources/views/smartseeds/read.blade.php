<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
<!--Inner Header Start-->
<div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
     <h1> @if (app()->isLocale('en'))
         {{ $header_en }}
         @else
         {{ $header }}
         @endif
         </h1>
      </div>
            <img src="{{ asset('uploads/image/'.$read->gambar) }}">
         </div>
</div>
<!--Inner Header End--> 
<!--About Start-->
<section>
<!--About Txt Video Start-->
<div> 
   <div class="container">
      
         @include('layout.breadcrumb') 
        
        <img src="{{ asset('uploads/image/'.$read->gambar) }}" alt="{{ $title }}" class="img-fluid img mb-3">
           <small class="text-muted">Caption: {{ $read->fitur }}</small>
         <div class="row justify-content-center">
         <ul class="nav py-3">
                        <li><span class="badge badge-primary p-2 mx-1"><i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_bulan',$read->tanggal)}}</span></li>

                        <li><span class="badge badge-primary p-2 mx-1"><i class="fas fa-user"></i> {{ $read->nama}}</span></li>
                     </ul>  

         <div class="col-lg-10">
         <h1 class="font-weight-bold mt-3">
         @if (app()->isLocale('en'))
         {{ $read->fitur_en }}
         @else
         {{ $read->fitur }}
         @endif
        </h1>
             
               <div class="konten">
               <p>
               @if (app()->isLocale('en'))
               <?=$read->konten_en ?>
         @else
         <?=$read->konten ?>
         @endif
              
               </p>
               </div>
         </div>
      </div>
   </div>
</div>
</section>
<!--About Txt Video End--> 



