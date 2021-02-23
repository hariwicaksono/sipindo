<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Faq_model extends Model
{

	protected $table 		= "faq";
	protected $primaryKey 	= 'id_faq';

    // listing
    public function semua()
    {
        $query = DB::table('faq')
            ->select('faq.*')
            ->orderBy('faq.id_faq','ASC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('faq')
            ->select('faq.*')
            ->where('faq.pertanyaan', 'LIKE', "%{$keywords}%") 
            ->orWhere('faq.pertanyaan_en', 'LIKE', "%{$keywords}%") 
            ->orWhere('faq.jawaban', 'LIKE', "%{$keywords}%") 
            ->orWhere('faq.jawaban_en', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_faq','DESC')
            ->get();
        return $query;
    }

}
