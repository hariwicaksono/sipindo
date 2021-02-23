<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog_model extends Model
{

	protected $table 		= "blog";
	protected $primaryKey 	= 'id_blog';

     // listing
    public function semua()
    {
        $query = DB::table('blog')
            ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->orderBy('id_blog','DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function blog_update()
    {
        $query = DB::table('blog')
            ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->where('jenis_blog','Blog')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->orderBy('id_blog','DESC')
            ->paginate(25);
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('blog')
            ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('blog.id_user',$id_user)
            ->orderBy('id_blog','DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('blog')
            ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('blog.judul_blog', 'LIKE', "%{$keywords}%") 
            ->orWhere('blog.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_blog','DESC')
           ->paginate(25);
        return $query;
    }

    // kategori
    public function all_kategori($id_kategori)
    {
        $query = DB::table('blog')
            ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'blog.id_kategori'    => $id_kategori))
            ->orderBy('id_blog','DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function status_blog($status_blog)
    {
        $query = DB::table('blog')
             ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'blog.status_blog'         => $status_blog))
            ->orderBy('id_blog','DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function jenis_blog($jenis_blog)
    {
        $query = DB::table('blog')
             ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'blog.jenis_blog'         => $jenis_blog))
            ->orderBy('id_blog','DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function kategori_depan($id_kategori)
    {
        $query = DB::table('blog')
             ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'blog.id_kategori'         => $id_kategori,
                            'blog.jenis_blog'       => 'blog',
                            'blog.status_blog'      => 'Publish'))
            ->orderBy('id_blog','DESC')
            ->paginate(12);
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('blog')
             ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array('blog.status_blog'=>'Publish','blog.jenis_blog' => 'blog'))
            ->orderBy('id_blog','DESC')
            ->paginate(10);
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('blog')
             ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array('blog.status_blog'=>'Publish','blog.jenis_blog' => 'blog'))
            ->orderBy('id_blog','DESC')
            ->limit(6)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_blog)
    {
        $query = DB::table('blog')
             ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('blog.slug_blog',$slug_blog)
            ->orderBy('id_blog','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_blog)
    {
        $query = DB::table('blog')
             ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'blog.id_user','LEFT')
            ->select('blog.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('blog.id_blog',$id_blog)
            ->orderBy('id_blog','DESC')
            ->first();
        return $query;
    }
}
