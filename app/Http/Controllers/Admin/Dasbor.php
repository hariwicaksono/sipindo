<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Konfigurasi_model;
use App\Models\Artikel_model;
use Image;
use PDF;

class Dasbor extends Controller
{
    // Index
    public function index(Request $request)
    {
        if(Session()->get('username')=="") {
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $news           = new Artikel_model();
        $artikel         = $news->semua();
    	$mysite = new Konfigurasi_model();
		$site 	= $mysite->listing();
       
        $data = array(  'title'     => $site->namaweb,
                        'breadcrumb' => 'Dashboard',
                        'artikel' => $artikel,
                        'content'   => 'admin/dasbor/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
