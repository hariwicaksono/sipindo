<section id="hero" class="d-flex align-items-center" style="color: #fff; background: url('{{ asset('uploads/image/'.$site_config->hero_bg) }}') top left;background-size: cover;">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
         
              <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="fade-up">
               
                  <h1><?php echo $site_config->hero_title;?></h1>
                  <h4>
                  @if (app()->isLocale('en'))
               <?=$site_config->hero_text_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->hero_text ?>
               @endif
                  </h4>
                  <div class="text-center text-lg-left">
                    <a href="{{url('/'.$site_config->hero_link)}}" class="btn-get-started scrollto">
                    @if (app()->isLocale('en'))
               <?=$site_config->hero_link_title_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->hero_link_title ?>
               @endif
                  </a>
                    <a href="<?php echo $site_config->link_googleplay;?>" target="_blank" rel="nofollow" class="btn-watch-video" role="button"><i aria-hidden="true" class="fab fa-google-play"></i>{{ __('lang.download') }}</a>
                  </div>
            
                </div>
              </div>
    </div>
  </div>
</section><!-- End Hero -->
 <!-- ======= About Section ======= -->
 <section id="about" class="about">
      <div class="container content">
           <!-- <div class="section-title mb-0">
          <h2>Tentang Kami</h2>
       <h3>Selamat Datang di <span>{{ $site_config->namaweb }}</span></h3>
          </div>-->
        <div class="row">
          <div class="col-md-7 pt-0 pt-lg-0 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h1><span>{{ $site_config->tagline2 }}</span></h1>
           
            <p>
            @if (app()->isLocale('en'))
               <?=$site_config->deskripsi_lengkap_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->deskripsi_lengkap ?>
               @endif
           </p>
            <a href="<?php echo $site_config->link_googleplay;?>" class="btn btn-success btn-lg" target="_blank" rel="nofollow" role="button">{{ __('lang.download') }} <i aria-hidden="true" class="fab fa-google-play"></i></a>
            

            <?php if($videoLive) { ?>
             <p>
            <div class="dots-item">
          <div class="dot dot--basic" aria-hidden="true"></div>
          <strong>Live {{$site_config->nama_youtube}}</strong>
        </div></p> 

            <div class="embed-responsive embed-responsive-16by9">
                   <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($videoLive->video, 2);?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
                     <?php } ?>
             
          </div>
          <div class="col-md-5 text-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ asset('uploads/image/'.$site_config->gambar) }}" alt="{{ $site_config->namaweb }}" class="img-fluid" width="200">
          </div> 
        </div>

      </div>
    </section>

    <!--Artikel Mulai-->
<section id="news" class="news section-bg">
      <div class="container" >
         <div class="section-title mb-0">
          <!--<h2>Fitur</h2>-->
          <h3>{{__('lang.fitur-aplikasi')}} <span>{{ $site_config->namaweb }}</span></span></h3>
        </div>
      
        <div class="content">
        <div class="row">
            <div class="col-md-5 ">
            
              <main id="device">  
                <div class="device mb-3">

                  <div class="app-carousel owl-carousel">
                      <?php foreach($sliderFitur as $slider) { ?>
                      <div class="item">
                        <img src="{{ asset('uploads/image/gallery/'.$slider->gambar) }}" alt=""> 
                      </div>
                      <?php } ?>
                    </div>
              
                </div>
              </main>
             
            </div>

            <div class="col-md-7" data-aos="fade-up">
            @if (app()->isLocale('en'))
               <?=$site_config->fitur_sipindo_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->fitur_sipindo ?>
               @endif
             
              </div>
            </div> 
        </div>
      </div>
      </div>
</section>
<!--News End--> 

<!--Penggunaan Mulai-->
<section id="penggunaan" class="penggunaan">
      <div class="container content" data-aos="fade-up">

         <div class="row">
           <div class="col-12">
         <h1><span>{{__('lang.penggunaan')}}</span></h1>

          <p>
          @if (app()->isLocale('en'))
               <?=$site_config->panduan_penggunaan_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->panduan_penggunaan ?>
               @endif
        </p>

                           <!--step--> 
                        <div id="steps">
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-cloud-download-alt fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>DOWNLOAD</h4>
                                            <p class="font-weight-light my-2">{{__('lang.panduan-download')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-plug fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>INSTALL</h4>
                                            <p class="font-weight-light my-2">{{__('lang.install-app')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-user-check fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>{{__('lang.registrasi')}}</h4>
                                            <p class="font-weight-light my-2">{{__('lang.daftar-verifikasi')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-mobile-alt fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>{{__('lang.gunakan')}}</h4>
                                            <p class="font-weight-light my-2">{{__('lang.siap-gunakan')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div><!---->
                      <div class="text-center">
                      <a href="<?php echo $site_config->link_googleplay;?>" class="btn btn-success" target="_blank" rel="nofollow" role="button">{{__('lang.download')}} <i aria-hidden="true" class="fab fa-google-play"></i></a>
                      </div>
            </div>

         </div> 
      </div>
</section>
<!--Penggunaan End--> 


<!--Smartseeds Mulai-->
<section id="smartseeds" class="smartseeds section-bg">
      <div class="container-fluid mx-5 content" data-aos="fade-up">
      <!--<div class="section-title mb-0">
          <h2>SMARTseeds</h2>
          
        </div>-->
        <h1><span>{{$site_config->smartseeds}}</span></h1>
         <div class="row">
         <div class="col-md-7">
         <p>
         @if (app()->isLocale('en'))
               <?=$site_config->smartseeds_deskripsi_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->smartseeds_deskripsi ?>
               @endif
         </p>
          <a href="{{ url('smartseeds-dashboards')}}" class="btn btn-success btn-lg">{{__('lang.fitur')}} <i aria-hidden="true" class="fa fa-arrow-right"></i></a>
          </div>
          <div class="col-md-5">
          <img src="{{ asset('uploads/image/'.$site_config->smartseeds_gambar) }}" alt="{{ $site_config->smartseeds }}" class="img-fluid">
            </div>
         </div> 
      </div>
</section>
<!--Smartseeds End--> 

<!--Smartseeds Mulai-->
<section id="smartseeds" class="smartseeds">
      <div class="container content" data-aos="fade-up">
      <h1><span>{{__('lang.fitur-aplikasi')}} {{$site_config->smartseeds}}</span></h1>
         <div class="row">
         <div class="col-md-6 text-center">
         <p>
         @if (app()->isLocale('en'))
               <?=$site_config->smartseeds_fitur_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->smartseeds_fitur ?>
               @endif
        
        </p>
         <a href="<?php echo $site_config->link_googleplay;?>" class="btn btn-success mt-2" target="_blank" rel="nofollow" role="button">{{__('lang.download')}} <i aria-hidden="true" class="fab fa-google-play"></i></a>
          </div>
          <div class="col-md-6">
          <div class="smartseeds-carousel owl-carousel owl-theme">
                      <?php foreach($sliderSmartseeds as $sliderSmartseeds) { ?>
                      <div class="item">
                        <img src="{{ asset('uploads/image/gallery/'.$sliderSmartseeds->gambar) }}" alt=""> 
                      </div>
                      <?php } ?>
                    </div>

            </div>
         </div> 
      </div>
</section>
<!--Smartseeds End--> 

<!--Artikel Mulai-->
<section id="news" class="news section-bg">
      <div class="container" data-aos="fade-up">
         <!--<div class="section-title mb-0">
          <h2>Artikel</h2>
        </div>-->
      
      <div class="content">
          <h2>{{__('lang.artikel')}} <a href="{{ url('artikel') }}" 
        class="float-right h5">{{__('lang.selengkapnya')}}</a></h2>

         <div class="row justify-content-center">
         <div class="card-columns">
            <?php foreach($artikel as $artikel) { ?>
            <!--Blog Small Post Start-->
           
               <div class="card">
                  <img src="{{ asset('uploads/image/artikel/thumbs/'.$artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->slug_artikel }}">
                  <div class="card-body">
                     <h6 class="font-weight-bold"><a href="{{ url('artikel/read/'.$artikel->slug_artikel) }}">
                     @if (app()->isLocale('en'))
                    <?=$artikel->judul_artikel_en ?? $artikel->judul_artikel ;?>
                    @else
                    <?=$artikel->judul_artikel ?>
                    @endif
                     </a></h6>
                    
                     <a href="{{ url('artikel/read/'.$artikel->slug_artikel) }}" class="float-right pb-3">{{__('lang.selengkapnya')}}</a>
                  </div>
               </div>
        
            <!--Blog Small Post End--> 
            <?php } ?>
            </div>
         </div>
         </div> 
      </div>
</section>
<!--News End--> 

<!--About Section Start-->
<section id="video" class="video gallery section-bg">
            <div class="container" data-aos="fade-up">
               <div class="row">
               <?php if($video) { ?>
                  <div class="col-md-5" data-aos="zoom-out" data-aos-delay="100">
                        <div class="video-img"><a href="https://www.youtube.com/watch?{{ $video->video }}" title="{{ $video->judul }}" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"><i class="fas fa-play"></i></a> <img src="{{ asset('uploads/image/video/'.$video->gambar) }}" alt=""> </div>
                   
                  </div>
                  <div class="col-md-7 content justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <h3>Video Youtube Sipindo Official</h3>
                        <h2>
                        @if (app()->isLocale('en'))
                        {{ $video->judul_en ?? 'no translation available' }}
                        @else
                        {{ $video->judul }}
                        @endif
                       
                        
                        </h2>
                        <p>
                        @if (app()->isLocale('en'))
                        <?=$video->keterangan_en ?? 'no translation available' ;?>
                        @else
                        <?=$video->keterangan ?>
                        @endif
                        
                        </p>
                  </div>
                  <?php } ?>
               </div>
            </div>
            
</section>
<!--About Section End--> 
         
 <!-- ======= Clients Section ======= -->
 <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">
   <div class="section-title mb-0">
          <h3>{{__('lang.didukung-oleh')}}</h3>
        </div>
        <div class="row justify-content-center">
        <?php 
               foreach($supportedby as $supportedby) {
               ?>
              <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center ">
                   <img src="{{ asset('uploads/image/gallery/'.$supportedby->gambar) }}" class="img-fluid" alt="">

               </div>
               <?php } ?>
    

        </div>

      </div>
    </section><!-- End Clients Section -->

<!--Testimonials Start-->
<section id="testimonials" class="testimonials">
   <div class="container" data-aos="zoom-in">
            <div class="section-title mb-0">
            <h2>{{__('lang.cerita-mereka')}}</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">
               <?php 
               foreach($testimonial as $testimoni) {
               ?>
               <div class="testimonial-item">
                   <img src="{{ asset('uploads/image/testimonials/'.$testimoni->gambar) }}" class="testimonial-img" alt="">
                  <h3><?php echo $testimoni->nama ?></h3>
                  <h4><?php echo $testimoni->perusahaan ?></h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      <?php echo \Illuminate\Support\Str::limit(strip_tags($testimoni->keterangan), 200, $end='...') ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>

               </div>
               <?php } ?>
            </div>
   </div>
</section> 
<!--Testimonials End--> 
