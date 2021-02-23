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
   <div class="container-fluid px-5">
      
      <div class="row">
         <?php foreach($smartseeds as $smartseeds) { ?>
            <?php if($smartseeds->posisi=="Kiri") { ?>
               <div class="col-md-7">
            <h2 class="feature-heading">
            @if (app()->isLocale('en'))
                     {{ $smartseeds->fitur_en ?? $smartseeds->konten }}
                     @else
                     {{ $smartseeds->fitur}}
                     @endif
            </h2>
            <p class="lead">
            @if (app()->isLocale('en'))
                     {{ $smartseeds->konten_en ?? $smartseeds->konten }}
                     @else
                     {{ $smartseeds->konten}}
                     @endif
            </p>
            <a href="{{ url('smartseeds-dashboards/'.$smartseeds->slug) }}" class="btn btn-success">{{__('lang.selengkapnya')}} <i class="fas fa-chevron-right"></i></a> 
         </div>

         <div class="col-md-5">
         <img src="{{ asset('uploads/image/thumbs/'.$smartseeds->gambar) }}" alt="{{ $smartseeds->fitur }}" class="img img-fluid">
         </div>
            <?php } else { ?>
               
         <div class="col-md-5">
         <img src="{{ asset('uploads/image/thumbs/'.$smartseeds->gambar) }}" alt="{{ $smartseeds->fitur }}" class="img img-fluid">
         </div>

               <div class="col-md-7">
            <h2 class="feature-heading">
            @if (app()->isLocale('en'))
                     {{ $smartseeds->fitur_en ?? $smartseeds->konten }}
                     @else
                     {{ $smartseeds->fitur}}
                     @endif
            </h2>
            <p class="lead">
            @if (app()->isLocale('en'))
                     {{ $smartseeds->konten_en ?? $smartseeds->konten }}
                     @else
                     {{ $smartseeds->konten}}
                     @endif
            </p>
            <a href="{{ url('smartseeds-dashboards/'.$smartseeds->slug) }}" class="btn btn-success">{{__('lang.selengkapnya')}} <i class="fas fa-chevron-right"></i></a> 
         </div>


            <?php } ?>
       
 
            <!--box  end--> 
         <?php } ?>
     
      </div>
     
   </div>

</section>
<!--Contact End--> 
