<style>
h1.display-4 {
   font-family: "Montserrat", sans-serif;
   font-weight: 700;
   }
</style>
<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
<!--Inner Header Start-->
<div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en'))
               {{ $title_en }}
               @else 
               {{$title}}
               @endif</h1>
</div>
      <img src="{{ asset('uploads/image/'.$bg->gambar) }}">
   </div>
</div>
<!--Inner Header End--> 

<!--Service Area Start-->
<section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
   @include('layout.breadcrumb') 

   <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
         <?php foreach($faq as $faq) { ?>
            <li>
            <li>
            <a data-toggle="collapse" class="collapsed" href="#faq{{$faq->id_faq}}">
               @if (app()->isLocale('en'))
               {{ $faq->pertanyaan_en ?? 'no translation available' }}
               @else 
               {{$faq->pertanyaan}}
               @endif <i class="icofont-simple-up"></i></a>
            <div id="faq{{$faq->id_faq}}" class="collapse" data-parent=".faq-list">
               @if (app()->isLocale('en'))
               <?=$faq->jawaban_en ?? 'no translation available' ;?>
               @else
               <?=$faq->jawaban;?>
               @endif
            </div>
          </li>
               
               
                 
              
              </li>

         <?php } ?>
      </ul>
   </div>
</div>

</section>

