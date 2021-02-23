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
<!--Blog Start-->

<section>
   
   <div class="container">
   @include('layout.breadcrumb') 

         <div class="card-columns">
            <?php foreach($artikel as $artikel) { ?>
            <!--Blog Small Post Start-->
            <div class="card">
            <a href="{{ asset('artikel/read/'.$artikel->slug_artikel) }}"><img src="{{ asset('uploads/image/artikel/thumbs/'.$artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->slug_artikel }}"></a>
           
               <div class="card-body">
                     <h5><a href="{{ asset('artikel/read/'.$artikel->slug_artikel) }}">
                     @if (app()->isLocale('en'))
                    <?=$artikel->judul_artikel_en ?? $artikel->judul_artikel ;?>
                    @else
                    <?=$artikel->judul_artikel ?>
                    @endif</a></h5>
                     <ul class="nav">
                        <li> <a href="{{ asset('artikel/read/'.$artikel->slug_artikel) }}"><i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_id',$artikel->tanggal_post)}}</a></li>
                       &nbsp;&nbsp;
                        <li> <a href="{{ asset('artikel/read/'.$artikel->slug_artikel) }}"><i class="fas fa-comments"></i> {{ $artikel->nama_kategori }}</a> </li>
                     </ul>
                     <p>
                   
                     @if (app()->isLocale('en'))

                     <?php 
                     $isi_en = \Illuminate\Support\Str::limit(strip_tags($artikel->isi_en), 100, $end='...') ;
                     ?>
                     <?=$isi_en ;?>
                    @else
                    <?php 
                     $isi = \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 100, $end='...');
                     
                     ?>
                    <?=$isi;?>
                    @endif
                     
                     
                     </p>
                     <a href="{{ asset('artikel/read/'.$artikel->slug_artikel) }}" class="float-right pb-2">{{__('lang.selengkapnya')}}</a>
                  
               </div>
            </div>
            <!--Blog Small Post End--> 
            <?php } ?>
         </div>
         <div class="row justify-content-center">
            {{ $artikels->links() }}
         </div>

   </div>
</section>
<!--Blog End--> 