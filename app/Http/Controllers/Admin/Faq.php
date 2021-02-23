<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Log_model;
use Image;

class Faq extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $faq   = DB::table('faq')->orderBy('id_faq','DESC')->get();

        $data = array(  'title'     => 'Data FAQ',
                        'breadcrumb' => 'FAQ',
                        'faq'  => $faq,
                        'content'   => 'admin/faq/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id_faq)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $faq   = DB::table('faq')->where('id_faq',$id_faq)->orderBy('id_faq','DESC')->first();

        $data = array(  'title'     => 'Edit Data FAQ',
                        'breadcrumb' => 'FAQ',
                        'faq'     => $faq,
                        'content'   => 'admin/faq/edit'
                    );
        return view('admin/layout/wrapper',$data);
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
                            'pertanyaan'     => 'required',
                            'jawaban'     => 'required',
                            ]);
            
        DB::table('faq')->insert([
                'pertanyaan'         => $request->pertanyaan,
                'pertanyaan_en'    => $request->pertanyaan_en,
                'jawaban'    => $request->jawaban,
                'jawaban_en'        => $request->jawaban_en,
                'tanggal' => date('Y-m-d H:i:s'),
                'id_user'       => Session()->get('id_user')
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data faq: $request->pertanyaan";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/faq')->with(['sukses' => 'Data telah ditambahkan']);
        
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'pertanyaan'     => 'required',
                            'jawaban'     => 'required',
                            ]);
     
       
        DB::table('faq')->where('id_faq',$request->id_faq)->update([
                'pertanyaan'         => $request->pertanyaan,
                'pertanyaan_en'    => $request->pertanyaan_en,
                'jawaban'    => $request->jawaban,
                'jawaban_en'        => $request->jawaban_en,
                'tanggal_diubah' => date('Y-m-d H:i:s'),
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data faq: $request->pertanyaan";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/faq')->with(['sukses' => 'Data telah diperbarui']);
        
    }

    // Delete
    public function delete($id_faq)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('faq')->where('id_faq',$id_faq)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data faq";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/faq')->with(['sukses' => 'Data telah dihapus']);
    }
}
