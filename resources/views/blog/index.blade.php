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
         <div class="row">
        
            <?php foreach($blog as $blog) { ?>
            
            <div class="col-md-3">
            <img src="{{ asset('uploads/image/blog/thumbs/'.$blog->gambar) }}" class="img-fluid mb-3" alt="<?php echo $blog->judul_blog ?>"> 
            </div>
               <div class="col-md-9">
                  
                     <h3><a href="{{ url('blog/read/'.$blog->slug_blog) }}"><?php  echo $blog->judul_blog ?></a></h3>
                     <ul class="nav">
                        <li><a class="text-muted" href="{{ url('blog/read/'.$blog->slug_blog) }}"><i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_id',$blog->tanggal_post)}}</a></li>
                        &nbsp;&nbsp;
                        <li><a class="text-muted" href="{{ url('blog/read/'.$blog->slug_blog) }}"><i class="fas fa-comments"></i> {{ $blog->nama_kategori }}</a></li>
                     </ul>
                     <p class="mt-3"><?php echo \Illuminate\Support\Str::limit(strip_tags($blog->isi), 100, $end='...') ?></p>
                     <a href="{{ url('blog/read/'.$blog->slug_blog) }}" class="read-post">{{__('lang.selengkapnya')}}</a>
         
               </div>
        
            <?php } ?>

         </div>
         <div>
            {{ $blogs->links() }}
         </div>
   
   </div>
</section>
<!--Blog End--> 