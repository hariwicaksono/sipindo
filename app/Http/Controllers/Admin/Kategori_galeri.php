<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Log_model;

class Kategori_galeri extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_galeri 	= DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Galeri',
        'breadcrumb' => 'Kategori Galeri',
						'kategori_galeri'	=> $kategori_galeri,
                        'content'           => 'admin/kategori_galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
  
    // tambah
    public function proses_tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_galeri' => 'required|unique:kategori_galeri',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_galeri = Str::slug($request->nama_kategori_galeri, '-');
        DB::table('kategori_galeri')->insert([
            'nama_kategori_galeri'  => $request->nama_kategori_galeri,
            'slug_kategori_galeri'	=> $slug_kategori_galeri,
            'urutan'   		        => $request->urutan
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data kategori galeri: $request->nama_kategori_galeri";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/kategori_galeri')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_galeri' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_galeri = Str::slug($request->nama_kategori_galeri, '-');
        DB::table('kategori_galeri')->where('id_kategori_galeri',$request->id_kategori_galeri)->update([
            'nama_kategori_galeri'  => $request->nama_kategori_galeri,
            'slug_kategori_galeri'	=> $slug_kategori_galeri,
            'urutan'                => $request->urutan
        ]);
        $username = Session()->get('username');
            $keterangan = "Melakukan Update data kategori galeri: $request->nama_kategori_galeri";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/kategori_galeri')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_galeri)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_galeri')->where('id_kategori_galeri',$id_kategori_galeri)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data kategori galeri";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
    	return redirect('admin/kategori_galeri')->with(['sukses' => 'Data telah dihapus']);
    }
}
