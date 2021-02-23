<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Layanan_model extends Model
{

	protected $table 		= "layanan";
	protected $primaryKey 	= 'id_layanan';

     // listing
    public function semua()
    {
        $query = DB::table('layanan')
            ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->orderBy('id_layanan','DESC')
            ->paginate(5);
        return $query;
    }

    // listing
    public function layanan_update()
    {
        $query = DB::table('layanan')
            ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->where('jenis_layanan','layanan')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->orderBy('id_layanan','DESC')
            ->paginate(5);
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('layanan')
            ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where('layanan.id_user',$id_user)
            ->orderBy('id_layanan','DESC')
            ->paginate(5);
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('layanan')
            ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where('layanan.judul_layanan', 'LIKE', "%{$keywords}%") 
            ->orWhere('layanan.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_layanan','DESC')
           ->paginate(5);
        return $query;
    }

    // kategori
    public function all_kategori($id_kategori)
    {
        $query = DB::table('layanan')
            ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where(array(  'layanan.id_kategori'    => $id_kategori))
            ->orderBy('id_layanan','DESC')
            ->paginate(5);
        return $query;
    }

    // kategori
    public function status_layanan($status_layanan)
    {
        $query = DB::table('layanan')
             ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where(array(  'layanan.status_layanan'         => $status_layanan))
            ->orderBy('id_layanan','DESC')
            ->paginate(5);
        return $query;
    }

    // kategori
    public function jenis_layanan($jenis_layanan)
    {
        $query = DB::table('layanan')
             ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where(array(  'layanan.jenis_layanan'         => $jenis_layanan))
            ->orderBy('id_layanan','DESC')
            ->paginate(5);
        return $query;
    }

    // kategori
    public function kategori_depan($id_kategori)
    {
        $query = DB::table('layanan')
             ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where(array(  'layanan.id_kategori'         => $id_kategori,
                            'layanan.jenis_layanan'       => 'layanan',
                            'layanan.status_layanan'      => 'Publish'))
            ->orderBy('id_layanan','DESC')
            ->paginate(12);
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('layanan')
             ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where(array('layanan.status_layanan'=>'Publish','layanan.jenis_layanan' => 'layanan'))
            ->orderBy('id_layanan','DESC')
            ->paginate(12);
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('layanan')
             ->join('kategori_layanan', 'kategori.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where(array('layanan.status_layanan'=>'Publish','layanan.jenis_layanan' => 'layanan'))
            ->orderBy('id_layanan','DESC')
            ->limit(4)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_layanan)
    {
        $query = DB::table('layanan')
             ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where('layanan.slug_layanan',$slug_layanan)
            ->orderBy('id_layanan','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_layanan)
    {
        $query = DB::table('layanan')
             ->join('kategori_layanan', 'kategori_layanan.id_kategori', '=', 'layanan.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'layanan.id_user','LEFT')
            ->select('layanan.*', 'kategori_layanan.slug_kategori', 'kategori_layanan.nama_kategori','users.nama')
            ->where('layanan.id_layanan',$id_layanan)
            ->orderBy('id_layanan','DESC')
            ->first();
        return $query;
    }
}
