<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Artikel_model;

class Artikel extends Controller
{
 
    // Beritapage
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$model 	= new Artikel_model();
		$artikel = $model->listing();

        $data = array(  'title'     => 'Artikel pertanian terlengkap dan akurat',
        'title_en'     => 'The most complete and accurate agricultural articles',
        'header' => 'Artikel',
        'header_en' => 'Article',
                        'deskripsi' => 'Beragam artikel pertanian mengenai cara bercocok tanam dan budi daya tanaman terlengkap dan tepercaya',
                        'keywords'  => 'artikel pertanian',
                        'site'		=> $site,
                        'artikel'	=> $artikel,
                        'artikels'    => $artikel,
                        'content'   => 'artikel/index'
                    );
        return view('layout/wrapper',$data);
    }

     // Cari
     public function cari(Request $request)
     {
         $myartikel           = new Artikel_model();
         $keywords           = $request->keywords;
         $artikel             = $myartikel->cari($keywords);
         $kategori           = DB::table('kategori')->orderBy('urutan','ASC')->get();
 
         $data = array(  'title'             => 'Pencarian Artikel',
                        'title_en'     => 'Search Article',

                        'header' => 'Pencarian Artikel',
                        'header_en' => 'Search Article',
                        'deskripsi' => 'Beragam artikel pertanian mengenai cara bercocok tanam dan budi daya tanaman terlengkap dan tepercaya',
                        'keywords'  => 'artikel pertanian',
                         'artikel'            => $artikel,
                         'artikels'    => $artikel,
                         'kategori'   => $kategori,
                         'content'           => 'artikel/index'
                     );
         return view('layout/wrapper',$data);
     }

    // Artikelpage
    public function kategori($slug_kategori)
    {
        $site       = DB::table('konfigurasi')->first();
        $kategori   = DB::table('kategori')->where('slug_kategori',$slug_kategori)->first();
         if(!$kategori)
        {
            return redirect('artikel');
        }
        $id_kategori= $kategori->id_kategori;
        $model      = new Artikel_model();
        $artikel     = $model->kategori_depan($id_kategori);


        $data = array(  'title'     => $kategori->nama_kategori,
        'title_en'     => $kategori->nama_kategori,
                        'deskripsi' => $kategori->nama_kategori,
                        'keywords'  => $kategori->nama_kategori,
                        'site'      => $site,
                        'artikel'    => $artikel,
                        'artikels'    => $artikel,
                        'content'   => 'artikel/index'
                    );
        return view('layout/wrapper',$data);
    }

    public function read($slug_artikel)
    {
        //Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        // $artikel = DB::table('artikel')->where('status_artikel','Publish')->orderBy('id_artikel', 'DESC')->get();
        $model  = new Artikel_model();
        $read   = $model->read($slug_artikel);
        if(!$read)
        {
            return redirect('artikel');
        }

        $data = array(  'title'     => 'Artikel - '.$read->judul_artikel,
                        'title_en'     => 'Article - ' .$read->judul_artikel_en,
                        'header'     => 'Artikel',
                    'header_en'     => 'Article',
                        'deskripsi' => $read->judul_artikel,
                        'keywords'  => $read->judul_artikel,
                        'site'      => $site,
                        'read'      => $read,
                        'content'   => 'artikel/read'
                    );
                    
        return view('layout/wrapper',$data);
    }
}