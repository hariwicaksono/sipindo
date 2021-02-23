<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use App\Models\Konfigurasi_model;
use App\Models\Smartseeds_model;
use App\Models\Log_model;
use Image;

class Smartseeds extends Controller
{ 

     // smartseeds b2b dashboard
     public function index()
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         $mykonfigurasi  = new Konfigurasi_model();
         $site           = $mykonfigurasi->listing();
 
         $data = array(  'title'        => 'SMARTseeds Profil Home',
                        'breadcrumb' => 'SMARTseeds Profil Home',
                         'site'         => $site,
                         'content'      => 'admin/smartseeds/index'
                     );
         return view('admin/layout/wrapper',$data);
     }

    // smartseeds b2b dashboard
    public function konten()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mymodel  = new Smartseeds_model();
        $site           = $mymodel->semua();

        $data = array(  'title'        => 'SMARTseeds Konten',
                        'breadcrumb' => 'SMARTseeds Konten',
                        'site'         => $site,
                        'content'      => 'admin/smartseeds/konten'
                    );
        return view('admin/layout/wrapper',$data);
    }

   


    // proses smartseeds
    public function proses_profil(Request $request)
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
                'smartseeds_deskripsi_en'       => $request->smartseeds_deskripsi_en,
                'smartseeds_fitur'       => $request->smartseeds_fitur,
                'smartseeds_fitur_en'       => $request->smartseeds_fitur_en,
                'smartseeds'       => $request->smartseeds,
                'smartseeds_gambar'        => $input['nama_file']
            ]);
        }else{
            DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
                'id_user'       => Session()->get('id_user'),
                'smartseeds_deskripsi'       => $request->smartseeds_deskripsi,
                'smartseeds_deskripsi_en'       => $request->smartseeds_deskripsi_en,
                'smartseeds_fitur'       => $request->smartseeds_fitur,
                'smartseeds_fitur_en'       => $request->smartseeds_fitur_en,
                'smartseeds'       => $request->smartseeds
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Update profil SMARTseeds Dashboard";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/smartseeds_b2b_dashboard')->with(['sukses' => 'Profil telah diperbarui']);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_faqnya       = $request->id_faq;
            for($i=0; $i < sizeof($id_faqnya);$i++) {
                DB::table('faq')->where('id_faq',$id_faqnya[$i])->delete();
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Hapus data faq: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/faq')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }

    // tambah
    public function proses_tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'fitur'     => 'required',
                            'konten'     => 'required',
                            'gambar'    => 'required|file|image|mimes:jpeg,png,jpg|max:8024'
                            ]);
        $image                  = $request->file('gambar');     
        $image                  = $request->file('gambar');
        if(!empty($image)) {
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
            // UPLOAD START    
            $slug = Str::slug($request->fitur, '-');   
        DB::table('smartseeds')->insert([
                'fitur'         => $request->fitur,
                'fitur_en'    => $request->fitur_en,
                'konten'    => $request->konten,
                'konten_en'        => $request->konten_en,
                'gambar'                => $input['nama_file'],
                'posisi'    => $request->posisi,
                'slug'  => $slug,
                'tanggal' => date('Y-m-d H:i:s'),
                'id_user'       => Session()->get('id_user')
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data smartseeds: $request->fitur";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/smartseeds/konten')->with(['sukses' => 'Data telah ditambahkan']);
    }else{
        $slug = Str::slug($request->fitur, '-');   
        DB::table('smartseeds')->insert([
            'fitur'         => $request->fitur,
            'fitur_en'    => $request->fitur_en,
            'konten'    => $request->konten,
            'konten_en'        => $request->konten_en,
            'posisi'    => $request->posisi,
            'slug'  => $slug,
            'tanggal' => date('Y-m-d H:i:s'),
            'id_user'       => Session()->get('id_user')
    ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data smartseeds: $request->fitur";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/smartseeds/konten')->with(['sukses' => 'Data telah ditambahkan']);
    } 
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'fitur'     => 'required',
                            'konten'     => 'required',
                            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:8024'
                            ]);
      // UPLOAD START
      $image                  = $request->file('gambar');
      if(!empty($image)) {
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
          $slug = Str::slug($request->fitur, '-');   
        DB::table('smartseeds')->where('id_smartseeds',$request->id_smartseeds)->update([
            'fitur'         => $request->fitur,
            'fitur_en'    => $request->fitur_en,
            'konten'    => $request->konten,
            'konten_en'        => $request->konten_en,
            'gambar'                => $input['nama_file'],
            'posisi'    => $request->posisi,
            'slug'  => $slug,
                'tanggal_diubah' => date('Y-m-d H:i:s'),
        ]);
        $username = Session()->get('username');
            $keterangan = "Melakukan Update data smartseeds: $request->fitur";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/smartseeds/konten')->with(['sukses' => 'Data telah diperbarui']);
        }else{
            $slug = Str::slug($request->fitur, '-');   
            DB::table('smartseeds')->where('id_smartseeds',$request->id_smartseeds)->update([
                'fitur'         => $request->fitur,
                'fitur_en'    => $request->fitur_en,
                'konten'    => $request->konten,
                'konten_en'        => $request->konten_en,
                'posisi'    => $request->posisi,
                'slug'  => $slug,
                    'tanggal_diubah' => date('Y-m-d H:i:s'),
            ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data smartseeds: $request->fitur";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/smartseeds/konten')->with(['sukses' => 'Data telah diperbarui']);
        }
    }

    // Delete
    public function delete($id_smartseeds)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         // hapus file
	    $img = Smartseeds_model::where('id_smartseeds',$id_smartseeds)->first();
	    File::delete('./public/uploads/image/'.$img['gambar']);
        File::delete('./public/uploads/image/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
	    Smartseeds_model::where('id_smartseeds',$id_smartseeds)->delete();
        //DB::table('smartseeds')->where('id_smartseeds',$id_smartseeds)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data smartseeds id: $id_smartseeds";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
        return redirect('admin/smartseeds/konten')->with(['sukses' => 'Data telah dihapus']);
    }

}
