<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=<?=$read->nama_font;?>:wght@<?=$read->styles;?>&display=swap" rel="stylesheet">
<style>
h1.display-4 {
   font-family: "{{$read->nama_font}}", sans-serif, serif;
   font-weight: {{$read->styles}};
   }
   .konten p {
      font-family: "{{$read->nama_font}}", sans-serif, serif;
      font-weight: normal;
   }
</style> 
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
            <img src="{{ asset('uploads/image/artikel/'.$read->gambar) }}">
         </div>
</div>
<!--Inner Header End--> 
<!--About Start-->
<section>
<!--About Txt Video Start-->
<div> 
   <div class="container">
      
         @include('layout.breadcrumb') 
        
        <img src="{{ asset('uploads/image/artikel/'.$read->gambar) }}" alt="{{ $title }}" class="img-fluid img mb-3">
           
         <div class="row justify-content-center">
         <ul class="nav py-3">
                        <li><span class="badge badge-primary p-2 mx-1"><i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_bulan',$read->tanggal_post)}}</span></li>
                      
                        <li><span class="badge badge-primary p-2 mx-1"><i class="fas fa-comments"></i> {{ $read->nama_kategori }}</span></li>
                        
                        <li><span class="badge badge-primary p-2 mx-1"><i class="fas fa-user"></i> {{ $read->nama}}</span></li>
                     </ul>  

         <div class="col-lg-10">
         <h1 class="display-4 mt-3">
         @if (app()->isLocale('en'))
         {{ $read->judul_artikel_en }}
         @else
         {{ $read->judul_artikel }}
         @endif
        </h1>
             
               <div class="konten">
               <p>
               @if (app()->isLocale('en'))
               <?=$read->isi_en ?>
         @else
         <?=$read->isi ?>
         @endif
              
               </p>
               </div>
         </div>
      </div>
   </div>
</div>
</section>
<!--About Txt Video End--> 



