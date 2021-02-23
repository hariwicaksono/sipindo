<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Artikel_model extends Model
{

	protected $table 		= "artikel";
	protected $primaryKey 	= 'id_artikel';

     // listing
    public function semua()
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->orderBy('id_artikel','DESC')
            ->paginate(5);
        return $query;
    }

    // listing
    public function artikel_update()
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->where('jenis_artikel','artikel')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->orderBy('id_artikel','DESC')
            ->paginate(5);
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('artikel.id_user',$id_user)
            ->orderBy('id_artikel','DESC')
            ->paginate(5);
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('artikel.judul_artikel', 'LIKE', "%{$keywords}%") 
            ->orWhere('artikel.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_artikel','DESC')
           ->paginate(25);
        return $query;
    }

    // kategori
    public function all_kategori($id_kategori)
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'artikel.id_kategori'    => $id_kategori))
            ->orderBy('id_artikel','DESC')
            ->paginate(5);
        return $query;
    }

    // kategori
    public function status_artikel($status_artikel)
    {
        $query = DB::table('artikel')
             ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'artikel.status_artikel'         => $status_artikel))
            ->orderBy('id_artikel','DESC')
            ->paginate(5);
        return $query;
    }

    // kategori
    public function jenis_artikel($jenis_artikel)
    {
        $query = DB::table('artikel')
             ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'artikel.jenis_artikel'         => $jenis_artikel))
            ->orderBy('id_artikel','DESC')
            ->paginate(5);
        return $query;
    }

    // kategori
    public function kategori_depan($id_kategori)
    {
        $query = DB::table('artikel')
             ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'artikel.id_kategori'         => $id_kategori,
                            'artikel.jenis_artikel'       => 'artikel',
                            'artikel.status_artikel'      => 'Publish'))
            ->orderBy('id_artikel','DESC')
            ->paginate(12);
        return $query;
    }

    // list home
        public function home()
        {
            $query = DB::table('artikel')
                 ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
                ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
                ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
                ->where(array('artikel.status_artikel'=>'Publish','artikel.jenis_artikel' => 'artikel'))
                ->orderBy('id_artikel','DESC')
                ->limit(8)
                ->get();
            return $query;
        }

    // list page
    public function listing()
    {
    	$query = DB::table('artikel')
             ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array('artikel.status_artikel'=>'Publish','artikel.jenis_artikel' => 'artikel'))
            ->orderBy('id_artikel','DESC')
            ->paginate(8);
        return $query;
    }
 
    // detail
    public function read($slug_artikel)
    {
        $query = DB::table('artikel')
             ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->join('fonts', 'fonts.id_font', '=', 'artikel.id_font','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama', 'fonts.nama_font', 'fonts.font_family','fonts.styles')
            ->where('artikel.slug_artikel',$slug_artikel)
            ->orderBy('id_artikel','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_artikel)
    {
        $query = DB::table('artikel')
             ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'artikel.id_user','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('artikel.id_artikel',$id_artikel)
            ->orderBy('id_artikel','DESC')
            ->first();
        return $query;
    }
}
