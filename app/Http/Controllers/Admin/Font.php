<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Log_model;
use Image;

class Font extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$font 	= DB::table('fonts')->orderBy('id_font','DESC')->get();
 
        $data = array(  'title'     => 'Font Sistem',
                        'breadcrumb' => 'Font',
						'font'      => $font,
                        'content'   => 'admin/fonts/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function proses_tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
                            'nama_font'     => 'required',
					        'styles' => 'required'
					        ]);
   
        DB::table('fonts')->insert([
        'nama_font'          => $request->nama_font,
        'styles'         => $request->styles,
        'id_user'      => Session()->get('id_user'),
        'tanggal_dibuat'      => date('Y-m-d H:i:s')
        ]);
        
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data font: $request->nama_font";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/font')->with(['sukses' => 'Data telah ditambahkan']);
    }

    // edit
    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_font'     => 'required',
                            'styles' => 'required'
					        ]);
        

        DB::table('fonts')->where('id_font',$request->id_font)->update([
            'nama_font'          => $request->nama_font,
            'styles'         => $request->styles,
            'tanggal_diubah'      => date('Y-m-d H:i:s')
        ]);
        
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data font: $request->nama_font";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/font')->with(['sukses' => 'Data telah diperbarui']);
    }

    // Delete
    public function delete($id_font)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('fonts')->where('id_font',$id_font)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data font";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
    	return redirect('admin/font')->with(['sukses' => 'Data telah dihapus']);
    }
}
