<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Pagination\Paginator;
use App\Models\Layanan_model;
//Paginator::useBootstrap();

class Layanan extends Controller
{
 
    // Layanan page 
    public function index()
    {
        //Paginator::useBootstrap();
    	$site 	= DB::table('konfigurasi')->first();
    	$model 	= new Layanan_model();
		$layanan = $model->listing();

        $data = array(  'title'     => 'Solusi Kami',
                        'title_en'     => 'Our Solution',
                        'deskripsi' => 'Solusi Kami',
                        'keywords'  => 'Solusi Kami',
                        'site'		=> $site,
                        'layanan'	=> $layanan,
                        'layanans'    => $layanan,
                        'content'   => 'layanan/index'
                    );
        return view('layout/wrapper',$data);
    }

    // Layanan page
    public function kategori($slug_kategori)
    {
        //Paginator::useBootstrap();
        $site       = DB::table('konfigurasi')->first();
        $kategori   = DB::table('kategori_layanan')->where('slug_kategori',$slug_kategori)->first();
         if(!$kategori)
        {
            return redirect('layanan');
        }
        $id_kategori= $kategori->id_kategori;
        $model      = new Layanan_model();
        $layanan     = $model->kategori_depan($id_kategori);


        $data = array(  'title'     => $kategori->nama_kategori,
                    'title_en'     => $kategori->nama_kategori,
                        'deskripsi' => $kategori->nama_kategori,
                        'keywords'  => $kategori->nama_kategori,
                        'site'      => $site,
                        'layanan'    => $layanan,
                        'layanans'    => $layanan,
                        'content'   => 'layanan/index'
                    );
        return view('layout/wrapper',$data);
    }

    public function read($slug_layanan)
    {
        //Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        // $artikel = DB::table('artikel')->where('status_artikel','Publish')->orderBy('id_artikel', 'DESC')->get();
        $model  = new Layanan_model();
        $read   = $model->read($slug_layanan);
        if(!$read)
        {
            return redirect('layanan');
        }

        $data = array(  'title'     => 'Solusi Kami - '.$read->judul_layanan,
                    'title_en'     => 'Our Solution - '.$read->judul_layanan_en,
                    'header'     => 'Solusi Kami',
                    'header_en'     => 'Our Solution',
                        'deskripsi' => $read->isi,
                        'keywords'  => $read->keywords,
                        'site'      => $site,
                        'read'      => $read,
                        'content'   => 'layanan/read'
                    );
        return view('layout/wrapper',$data);
    }
}