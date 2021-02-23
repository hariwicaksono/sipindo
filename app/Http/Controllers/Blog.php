<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Blog_model;
//Paginator::useBootstrap();

class Blog extends Controller
{
 
    // blogpage
    public function index()
    {
        //Paginator::useBootstrap();
    	$site 	= DB::table('konfigurasi')->first();
    	$model 	= new Blog_model();
		$blog = $model->listing();

        $data = array(  'title'     => 'Blog',
                        'title_en' => 'Blog',
                        'header' => 'Blog',
                        'header_en' => 'Blog',
                        'deskripsi' => 'Blog',
                        'keywords'  => 'Blog',
                        'site'		=> $site,
                        'blog'	=> $blog,
                        'blogs'    => $blog,
                        'content'   => 'blog/index'
                    );
        return view('layout/wrapper',$data);
    }

    // blogpage
    public function kategori($slug_kategori)
    {
        //Paginator::useBootstrap();
        $site       = DB::table('konfigurasi')->first();
        $kategori   = DB::table('kategori')->where('slug_kategori',$slug_kategori)->first();
         if(!$kategori)
        {
            return redirect('blog');
        }
        $id_kategori= $kategori->id_kategori;
        $model      = new Blog_model();
        $blog     = $model->kategori_depan($id_kategori);


        $data = array(  'title'     => 'Blog '.$kategori->nama_kategori,
        'title_en' => 'Blog '.$kategori->nama_kategori,
                        'header' => 'Blog',
                        'header_en' => 'Blog',
                        'deskripsi' => $kategori->nama_kategori,
                        'keywords'  => $kategori->nama_kategori,
                        'site'      => $site,
                        'blog'    => $blog,
                        'blogs'    => $blog,
                        'content'   => 'blog/index'
                    );
        return view('layout/wrapper',$data);
    }

    // read
    public function read($slug_blog)
    {
        //Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        // $blog = DB::table('blog')->where('status_blog','Publish')->orderBy('id_blog', 'DESC')->get();
        $model  = new Blog_model();
        $read   = $model->read($slug_blog);
        if(!$read)
        {
            return redirect('blog');
        }

        $data = array(  'title'     => 'Blog - '.$read->judul_blog,
        'title_en' => 'Blog ' .$read->judul_blog,
                        'header' => 'Blog',
                        'header_en' => 'Blog',
                        'deskripsi' => $read->judul_blog,
                        'keywords'  => $read->judul_blog,
                        'site'      => $site,
                        'read'      => $read,
                        'content'   => 'blog/read'
                    );
        return view('layout/wrapper',$data);
    }
}