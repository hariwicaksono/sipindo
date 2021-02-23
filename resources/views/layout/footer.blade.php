<?php 
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site_config = DB::table('konfigurasi')->first();
// Nav profil
$myprofil    = new Nav_model();
$nav_profilf  = $myprofil->nav_profil();
$nav_layananf = $myprofil->nav_layanan();
?>
<!--Footer Start-->
<footer id="footer" class="bg-success text-light">
   <div class="container py-5" >
      <div class="row">
         <!--Footer Widget Start-->
         <div class="col-md-7">
            <div class="footer-widget">
               <h3>{{ $site_config->namaweb }}</h3>
               <p>@if (app()->isLocale('en')){{ $site_config->deskripsi_singkat_en ?? 'no translation available' }}@else{{$site_config->deskripsi_singkat}}@endif</p>
              
               <a class="btn btn-warning" href="{{ url('kontak') }}">{{ __('lang.kontak') }}</a>
            </div>
         </div>
         <!--Footer Widget End--> 
         <!--Footer Widget Start-->
         <div class="col-md-5">
            <div class="footer-widget">
               <h3>{{ __('lang.download') }}</h3>
               <div class="footer-social">
                  <a href='{{ $site_config->link_googleplay }}' target="_blank" rel="nofollow"><img src="{{ url('uploads/image/play_badge_web_generic.png') }}" class="img-fluid" width="200" alt="Download SIPINDO on Google Play"></a> 
               </div>
            </div>
         </div>
         <!--Footer Widget End--> 
      </div>
     <hr/>
      <div>
         <div class="copyright">
         &copy; Copyright <?=date('Y');?> <strong><span><a class="text-light" href="{{ url('/') }}">{{ $site_config->namaweb }}</a></span></strong>. All Rights Reserved
         </div>
         <div class="credits text-light">
         
         </div>
      </div>

   </div>
</footer>
<!--Footer End--> 

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>
<!--   JS Files Start  --> 
<script>
    //Initialize Owl Carousel
    var owl = $('.app-carousel');
    owl.owlCarousel({
        items:1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true
    });
    $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
        owl.trigger('stop.owl.autoplay')
    })

    $('.smartseeds-carousel').owlCarousel({
         loop:true,
         margin:10,
         nav:false,
         responsive:{
            0:{
                  items:1
            },
            600:{
                  items:2
            },
            1000:{
                  items:3
            }
         }
      })

      $( ".datepicker" ).datepicker({
      inline: true,
      changeYear: true,
      changeMonth: true,
      dateFormat: "yy-mm-dd",
      yearRange: "1920:2020"
      });

      $( ".tanggal" ).datepicker({
      inline: true,
      changeYear: true,
      changeMonth: true,
      dateFormat: "dd-mm-yy",
      yearRange: "1920:2020"
      });
</script>
  <script src="{{ asset('assets/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/template/assets/vendor/aos/aos.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/template/assets/js/main.js') }}"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125247670-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-125247670-1');
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125236393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-125236393-1');
    </script>
</body>
</html>