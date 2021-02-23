<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Smartseeds_model;
use PDF;

class Smartseeds extends Controller
{ 

    // Smartseeds
    public function index() 
    {
        $site_config   = DB::table('konfigurasi')->first();
        $model   = new Smartseeds_model();
        $smartseeds = $model->semua();

        $data = array(  'title'     => 'SMARTseeds Geodata Intelligence Dashboard',
        'title_en'     => 'SMARTseeds Geodata Intelligence Dashboard',
        'header' => 'SMARTseeds B2B Dashboards',
        'header_en' => 'SMARTseeds B2B Dashboards',
                        'deskripsi' => 'Smartseeds '.$site_config->namaweb,
                        'keywords'  => 'Smartseeds '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'smartseed'    => $smartseeds,
                        'smartseeds'    => $smartseeds,
                        'content'   => 'smartseeds/index'
                    );
        return view('layout/wrapper',$data);
    }

    public function read($slug)
    {
        $site   = DB::table('konfigurasi')->first();
        // $artikel = DB::table('artikel')->where('status_artikel','Publish')->orderBy('id_artikel', 'DESC')->get();
        $model  = new Smartseeds_model();
        $read   = $model->read($slug);
        if(!$read)
        {
            return redirect('smartseeds');
        }

        $data = array(  'title'     => 'SMARTseeds - '.$read->fitur,
                        'title_en'     => 'SMARTseeds - ' .$read->fitur_en,
                        'header'     => 'SMARTseeds B2B Dashboards',
                    'header_en'     => 'SMARTseeds B2B Dashboards',
                        'deskripsi' => $read->konten,
                        'keywords'  => $read->konten,
                        'site'      => $site,
                        'read'      => $read,
                        'content'   => 'smartseeds/read'
                    );
                    
        return view('layout/wrapper',$data);
    }

}
