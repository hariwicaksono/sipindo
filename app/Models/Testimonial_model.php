<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Testimonial_model extends Model
{

	protected $table 		= "testimonial";
	protected $primaryKey 	= 'id_testimonial';

    // listing
    public function semua()
    {
        $query = DB::table('testimonial')
            ->select('testimonial.*')
            ->orderBy('testimonial.id_testimonial','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('testimonial')
            ->select('testimonial.*')
            ->where('testimonial.nama', 'LIKE', "%{$keywords}%") 
            ->orWhere('testimonial.keterangan', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_testimonial','DESC')
            ->get();
        return $query;
    }

}
