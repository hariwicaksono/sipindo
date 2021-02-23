<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 
use App\Helpers\Website;

class Video_model extends Model
{

     // listing
     protected $table 		= "video";
	protected $primaryKey 	= 'id_video';

     // listing
    public function aktif()
    {
        $query = DB::table('video')
            ->select('*')
            ->where(array('aktif'=>'1','live'=>'no'))
            ->orderBy('id_video','DESC')
            ->first();
        return $query;
    }

    public function live()
    {
        $query = DB::table('video')
            ->select('*')
            ->where(array('aktif'=>'1','live'=>'yes'))
            ->orderBy('id_video','DESC')
            ->first();
        return $query;
    }

    public function cari($keywords)
    {
        $query = DB::table('video')
            ->select('*')
            ->where('video.judul', 'LIKE', "%{$keywords}%") 
            ->orWhere('video.keterangan', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_video','DESC')
            ->paginate(25);
        return $query;
    }



}
