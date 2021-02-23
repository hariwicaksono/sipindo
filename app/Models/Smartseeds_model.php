<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Smartseeds_model extends Model
{

	protected $table 		= "smartseeds";
	protected $primaryKey 	= 'id_smartseeds';

    // listing
    public function semua() 
    {
        $query = DB::table('smartseeds')
            ->select('smartseeds.*')
            ->orderBy('smartseeds.id_smartseeds','ASC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('smartseeds')
            ->select('smartseeds.*')
            ->where('smartseeds.fitur', 'LIKE', "%{$keywords}%") 
            ->orWhere('smartseeds.fitur_en', 'LIKE', "%{$keywords}%") 
            ->orWhere('smartseeds.konten', 'LIKE', "%{$keywords}%") 
            ->orWhere('smartseeds.konten_en', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_smartseeds','DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug)
    {
        $query = DB::table('smartseeds')
            ->join('users', 'users.id_user', '=', 'smartseeds.id_user','LEFT')
            ->select('smartseeds.*', 'users.nama')
            ->where('smartseeds.slug',$slug)
            ->orderBy('id_smartseeds','DESC')
            ->first();
        return $query;
    }

}
