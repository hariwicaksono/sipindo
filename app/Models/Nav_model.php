<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nav_model extends Model
{

   
    // Main page
    public function nav_profil()
    {
    	$query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(	'artikel.status_artikel'	=> 'Publish',
                            'artikel.jenis_artikel'  => 'Profil'))
            ->orderBy('artikel.id_artikel','DESC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_artikel()
    {
        $query = DB::table('kategori')
            ->orderBy('kategori.urutan','DESC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_materi()
    {
        $query = DB::table('kategori_download')
            ->orderBy('kategori_download.urutan','ASC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_layanan()
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(  'artikel.status_artikel'  => 'Publish',
                            'artikel.jenis_artikel'  => 'Layanan'))
            ->orderBy('artikel.urutan','ASC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_terjadi()
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(  'artikel.status_artikel'  => 'Publish',
                            'artikel.jenis_artikel'  => 'Terjadi'))
            ->orderBy('artikel.urutan','ASC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_jenis($jenis_artikel)
    {
        $query = DB::table('artikel')
            ->join('kategori', 'kategori.id_kategori', '=', 'artikel.id_kategori','LEFT')
            ->select('artikel.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(  'artikel.status_artikel'  => 'Publish',
                            'artikel.jenis_artikel'  => $jenis_artikel))
            ->orderBy('artikel.urutan','ASC')
            ->get();
        return $query;
    }
}
