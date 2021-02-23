<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Konfigurasi_model;
use App\Models\Log_model;
use Image;

class Konfigurasi extends Controller
{ 
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mykonfigurasi 	= new Konfigurasi_model();
		$site 			= $mykonfigurasi->listing();

        $data = array(  'title'        => 'Pengaturan Sistem',
                        'breadcrumb' => 'Konfigurasi',
						'site'         => $site,
                        'content'      => 'admin/konfigurasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // logo
    public function logo()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Pengaturan Logo',
        'breadcrumb' => 'Pengaturan Logo',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/logo'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // smartseeds b2b dashboard
    public function smartseeds()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'SMARTseeds B2B Dashboard',
        'breadcrumb' => 'Konfigurasi',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/smartseeds'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // logo
    public function profil() 
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Profil '.$site->namaweb,
                        'breadcrumb'  => 'Profil',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/profil'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // gambar
    public function gambar()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Pengaturan Gambar',
        'breadcrumb' => 'Pengaturan Gambar',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/gambar'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // icon
    public function icon()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Pengaturan Icon',
        'breadcrumb' => 'Pengaturan Icon',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/icon'
                    );
        return view('admin/layout/wrapper',$data);
    }


    // email
    public function email()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Pengaturan Email',
        'breadcrumb' => 'Pengaturan Email',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/email'
                    );
        return view('admin/layout/wrapper',$data);
    } 

    // Proses
    public function proses(Request $request)
    { 
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);} 
        request()->validate([
                            'namaweb'          => 'required',
                            'deskripsi_singkat'          => 'required',
                            ]);
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/thumbs/';
            $img  = Image::make($image->getRealPath())->resize(600, 400, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
                'tagline'           => $request->tagline,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi_singkat_en' => $request->deskripsi_singkat_en,
                'website'           => $request->website,
                'email'             => $request->email,
                'email_cadangan'    => $request->email_cadangan,
                'alamat'            => $request->alamat,
                'telepon'           => $request->telepon,
                'hp'                => $request->hp,
                'fax'               => $request->fax,
                'link_googleplay'   => $request->link_googleplay,
                'link_appstore'     => $request->link_appstore,
                'hero_bg'        => $input['nama_file'],
                'hero_title'     => $request->hero_title,
                'hero_text'      => $request->hero_text,
                'hero_text_en'      => $request->hero_text_en,
                'hero_link'    => $request->hero_link,
                'hero_link_title'    => $request->hero_link_title,
                'hero_link_title_en'    => $request->hero_link_title_en,
                'keywords'          => $request->keywords,
                'metatext'          => $request->metatext,
                'facebook'          => $request->facebook,
                'twitter'           => $request->twitter,
                'instagram'         => $request->instagram,
                'youtube'         => $request->youtube,
                'nama_facebook'     => $request->nama_facebook,
                'nama_twitter'      => $request->nama_twitter,
                'nama_instagram'    => $request->nama_instagram,
                'nama_youtube'    => $request->nama_youtube,
                'google_map'        => $request->google_map,
                'text_bawah_peta'   => $request->text_bawah_peta,
                'link_bawah_peta'   => $request->link_bawah_peta,
                'id_user'           => Session()->get('id_user')
                
            ]);
        }else{
            DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
                'tagline'           => $request->tagline,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi_singkat_en' => $request->deskripsi_singkat_en,
                'website'           => $request->website,
                'email'             => $request->email,
                'email_cadangan'    => $request->email_cadangan,
                'alamat'            => $request->alamat,
                'telepon'           => $request->telepon,
                'hp'                => $request->hp,
                'fax'               => $request->fax,
                'link_googleplay'   => $request->link_googleplay,
                'link_appstore'     => $request->link_appstore,
                'hero_title'     => $request->hero_title,
                'hero_text'      => $request->hero_text,
                'hero_text_en'      => $request->hero_text_en,
                'hero_link'    => $request->hero_link,
                'hero_link_title'    => $request->hero_link_title,
                'hero_link_title_en'    => $request->hero_link_title_en,
                'keywords'          => $request->keywords,
                'metatext'          => $request->metatext,
                'facebook'          => $request->facebook,
                'twitter'           => $request->twitter,
                'instagram'         => $request->instagram,
                'youtube'         => $request->youtube,
                'nama_facebook'     => $request->nama_facebook,
                'nama_twitter'      => $request->nama_twitter,
                'nama_instagram'    => $request->nama_instagram,
                'nama_youtube'    => $request->nama_youtube,
                'google_map'        => $request->google_map,
                'text_bawah_peta'   => $request->text_bawah_peta,
                'link_bawah_peta'   => $request->link_bawah_peta,
                'id_user'           => Session()->get('id_user')
            ]);
        }
       
        $username = Session()->get('username');
        $keterangan = "Melakukan Update konfigurasi website";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/konfigurasi')->with(['sukses' => 'Data telah diperbarui']);
    }

    // Proses
    public function proses_email(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'protocol'          => 'required',
                            'smtp_host'          => 'required',
                            'smtp_port'          => 'required',
                            'smtp_timeout'       => 'required',
                            'smtp_user'          => 'required',
                            'smtp_pass'          => 'required'
                            ]);
       DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'protocol'          => $request->protocol,
            'smtp_host'         => $request->smtp_host,
            'smtp_port'         => $request->smtp_port,
            'smtp_timeout'      => $request->smtp_timeout,
            'smtp_user'         => $request->smtp_user,
            'smtp_pass'         => $request->smtp_pass,
            'id_user'           => Session()->get('id_user'),
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Update konfigurasi email";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/konfigurasi/email')->with(['sukses' => 'Data setting email telah diupdate']);
    }

    // logo
    public function proses_logo(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'logo'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('logo');
        $filenamewithextension  = $request->file('logo')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'.'.$image->getClientOriginalExtension();
        $destinationPath        = './public/uploads/image/thumbs/';
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = './public/uploads/image/';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'logo'     => $input['nama_file']
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Update logo";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/konfigurasi/logo')->with(['sukses' => 'Logo telah diupdate']);
    }

    // proses profil
    public function proses_profil(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            )); 
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
                'id_user'       => Session()->get('id_user'),
                'deskripsi_lengkap'       => $request->deskripsi_lengkap,
                'deskripsi_lengkap_en'       => $request->deskripsi_lengkap_en,
                'profil_lengkap'       => $request->profil_lengkap,
                'profil_lengkap_en'       => $request->profil_lengkap_en,
                'fitur_sipindo'       => $request->fitur_sipindo,
                'fitur_sipindo_en'       => $request->fitur_sipindo_en,
                'panduan_penggunaan'       => $request->panduan_penggunaan,
                'panduan_penggunaan_en'       => $request->panduan_penggunaan_en,
                'gambar'        => $input['nama_file']
            ]);
        }else{
            DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
                'id_user'       => Session()->get('id_user'),
                'deskripsi_lengkap'       => $request->deskripsi_lengkap,
                'deskripsi_lengkap_en'       => $request->deskripsi_lengkap_en,
                'profil_lengkap'       => $request->profil_lengkap,
                'profil_lengkap_en'       => $request->profil_lengkap_en,
                'fitur_sipindo'       => $request->fitur_sipindo,
                'fitur_sipindo_en'       => $request->fitur_sipindo_en,
                'panduan_penggunaan'       => $request->panduan_penggunaan,
                'panduan_penggunaan_en'       => $request->panduan_penggunaan_en
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Update profil";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/konfigurasi/profil')->with(['sukses' => 'Profil telah diperbarui']);
    }

    // proses smartseeds
    public function proses_smartseeds(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'smartseeds_gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('smartseeds_gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('smartseeds_gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            )); 
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
                'id_user'       => Session()->get('id_user'),
                'smartseeds_deskripsi'       => $request->smartseeds_deskripsi,
                'smartseeds_fitur'       => $request->smartseeds_fitur,
                'smartseeds'       => $request->smartseeds,
                'smartseeds_gambar'        => $input['nama_file']
            ]);
        }else{
            DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
                'id_user'       => Session()->get('id_user'),
                'smartseeds_deskripsi'       => $request->smartseeds_deskripsi,
                'smartseeds_fitur'       => $request->smartseeds_fitur,
                'smartseeds'       => $request->smartseeds
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Update profil SMARTseeds Dashboard";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/konfigurasi/smartseeds_b2b_dashboard')->with(['sukses' => 'Profil telah diperbarui']);
    }

    // proses icon
    public function proses_icon(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'icon'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('icon');
        $filenamewithextension  = $request->file('icon')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'.'.$image->getClientOriginalExtension();
        $destinationPath        = './assets/upload/image/thumbs';
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = './assets/upload/image';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'icon'     => $input['nama_file']
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Update icon situs";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/konfigurasi/icon')->with(['sukses' => 'Icon telah diupdate']);
    }

    // gambar
    public function proses_gambar(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath        = './public/uploads/image/thumbs/';
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = './public/uploads/image/';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'gambar'     => $input['nama_file']
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Update gambar";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/konfigurasi/gambar')->with(['sukses' => 'Gambar Banner telah diupdate']);
    }

}
