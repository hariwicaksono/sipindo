<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Artikel_model;
use App\Models\Staff_model;
use App\Models\Testimonial_model;
use App\Models\Video_model;
use App\Models\Faq_model;
use PDF;

class Home extends Controller
{ 
    // Homepage
    public function index()
    {
    	$site_config   = DB::table('konfigurasi')->first();
        $model          = new Video_model;
        $video          = $model->aktif();
        $videoLive          = $model->live();
        $sliderFitur         = DB::table('galeri')->where(array('id_kategori_galeri' => '1','jenis_galeri' => 'Homepage'))->orderBy('urutan', 'ASC')->get();
        $sliderSmartseeds         = DB::table('galeri')->where(array('id_kategori_galeri' => '2','jenis_galeri' => 'Homepage'))->orderBy('urutan', 'ASC')->get();
        $imgSupportedby         = DB::table('galeri')->where(array('id_kategori_galeri' => '3','jenis_galeri' => 'Homepage'))->orderBy('urutan', 'ASC')->get();

        $testimoni = new Testimonial_model();
        $testimonial      = $testimoni->semua();
        $news           = new Artikel_model();
        $artikel         = $news->home();

        $data = array(  'title'         => 'Beranda',
                        'title_en'     => 'Home',
                        'deskripsi'     => $site_config->namaweb.' - '.$site_config->tagline,
                        'keywords'      => $site_config->namaweb.' - '.$site_config->tagline,
                        'site_config'   => $site_config,
                        'artikel'        => $artikel,
                        'artikels'       => $artikel,
                        'sliderFitur'   => $sliderFitur,
                        'sliderSmartseeds'   => $sliderSmartseeds,
                        'supportedby' => $imgSupportedby,
                        'video'         => $video,
                        'videoLive'         => $videoLive,
                        'testimonial' => $testimonial,
                        'content'       => 'home/index'
                    );
        return view('layout/wrapper',$data);
    } 

    // Homepage
    public function tentang()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $news   = new Artikel_model();
        $artikel = $news->home();
        // Staff
        $kategori_staff  = DB::table('kategori_staff')->orderBy('urutan','ASC')->get();
        $layanan = DB::table('layanan')->where(array('jenis_layanan' => 'Layanan','status_layanan' => 'Publish'))->orderBy('urutan', 'ASC')->get();

        $data = array(  'title'     => 'Tentang Kami',
                        'title_en'     => 'About Us',
                        'header'     => 'Tentang Kami',
                        'header_en'     => 'About Us',
                        'deskripsi' => 'Tentang '.$site_config->namaweb,
                        'keywords'  => 'Tentang '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'artikel'    => $artikel,
                        'layanan'   => $layanan,
                        'kategori_staff'     => $kategori_staff,
                        'content'   => 'home/tentang'
                    );
        return view('layout/wrapper',$data);
    }


    // kontak
    public function kontak()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Hubungi Kami',
        'title_en'     => 'Contact Us',
        'header'     => 'Kontak Kami',
        'header_en'     => 'Contact Us',
                        'deskripsi' => 'Kontak '.$site_config->namaweb,
                        'keywords'  => 'Kontak '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/kontak'
                    );
        return view('layout/wrapper',$data);
    }

    // coba
    public function coba()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Coba Sekarang',
        'title_en'     => 'Try Now',
        'header' => 'Coba Sekarang',
        'header_en' => 'Try Now',
                        'deskripsi' => 'Coba Sekarang '.$site_config->namaweb,
                        'keywords'  => 'Coba Sekarang '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/coba'
                    );
        return view('layout/wrapper',$data);
    }

    public function member()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Membership',
        'title_en'     => 'Membership',
        'header' => 'Membership',
        'header_en' => 'Membership',
                        'deskripsi' => 'Membership '.$site_config->namaweb,
                        'keywords'  => 'Membership '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/member'
                    );
        return view('layout/wrapper',$data);
    }

    // faq
    public function faq()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $faqmodel   = new Faq_model();
        $faq = $faqmodel->semua();

        $data = array(  'title'     => 'Pertanyaan yang Sering Diajukan',
        'title_en'     => 'Frequently Asked Questions',
        'header' => 'FAQ',
        'header_en' => 'FAQ',
                        'deskripsi' => 'Frequently Asked Questions '.$site_config->namaweb,
                        'keywords'  => 'Frequently Asked Questions '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'faq'    => $faq,
                        'faqs'    => $faq,
                        'content'   => 'home/faq'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function teritorial_mapping()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Pemetaan Penanaman',
        'title_en'     => 'Teritorial Mapping',
        'header'     => 'Pemetaan Penanaman',
                        'header_en'     => 'Teritorial Mapping',
                        'deskripsi' => 'Pemetaan Penanaman '.$site_config->namaweb,
                        'keywords'  => 'Pemetaan Penanaman '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/pemetaan'
                    );
        return view('layout/wrapper',$data);
    }

    public function market_price()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Harga Pasar',
        'title_en'     => 'Market Price',
        'header'     => 'Harga Pasar',
        'header_en'     => 'Market Price',
                        'deskripsi' => 'Harga Pasar '.$site_config->namaweb,
                        'keywords'  => 'Harga Pasar '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/hargapasar'
                    );
        return view('layout/wrapper',$data); 
    }

}
