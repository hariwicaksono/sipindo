<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Testimonial_model;

class Testimonial extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $testimonial = DB::table('testimonial')
                    ->select('*')
                    ->orderBy('id_testimonial','DESC')
                    ->paginate(10);
       	$site 	= DB::table('konfigurasi')->first();

		$data = array(  'title'		=> 'Testimonial '.$site->namaweb,
						'deskripsi'	=> 'Testimonial '.$site->namaweb,
						'keywords'	=> 'Testimonial '.$site->namaweb,
						'testimonials'	=> $testimonial,
						'site'		=> $site,
                        'content'	=> 'testimonial/index'
                    );
        return view('layout/wrapper',$data);
    }

}
