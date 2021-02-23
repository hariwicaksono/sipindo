<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
<!--Inner Header Start-->
<section class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en')){{ $title_en ?? '' }}@else{{$title}}@endif</h1>
</div>
      <img src="{{ asset('uploads/image/'.$bg->gambar) }}">
   </div>
</section> 
<!--Inner Header End--> 
<!--Blog Start-->
<section class="wf100 p80 blog">
   <div class="blog-grid"> 
      <div class="container">
         <div class="row">
            <?php foreach($layanan as $layanan) { ?>
            <!--Blog Small Post Start-->
            <div class="col-md-6 col-sm-12">
               <div class="card">
                  <img src="{{ asset('uploads/image/layanan/thumbs/'.$layanan->gambar) }}" class="img img-fluid" alt="<?php echo $layanan->judul_layanan ?>"> 
                  <div class="card-body">
                     <h5><a href="{{ url('solusi-kami/'.$layanan->slug_layanan) }}">@if (app()->isLocale('en'))
               <?=$layanan->judul_layanan_en ?? $layanan->judul_layanan ;?>
               @else
               <?=$layanan->judul_layanan ?>
               @endif</a></h5>
                   
               @if (app()->isLocale('en'))
               <p><?php echo \Illuminate\Support\Str::limit(strip_tags($layanan->isi_en), 100, $end='...') ?></p>
               @else
               <p><?php echo \Illuminate\Support\Str::limit(strip_tags($layanan->isi), 100, $end='...') ?></p>
               @endif
               
                     
                     <a href="{{ url('solusi-kami/'.$layanan->slug_layanan) }}" class="float-right">{{__('lang.selengkapnya')}}</a>
                  </div>
               </div>
            </div>
            <!--Blog Small Post End--> 
            <?php } ?>
         </div>
         <div class="gt-pagination">
            {{ $layanans->links() }}
         </div>
      </div>
   </div>
</section>
<!--Blog End--> 

<script type="text/javascript">
    $(document).ready(function() {
      $("#SolusiNav .nav-link").addClass('active'); 
    }); 
  </script>