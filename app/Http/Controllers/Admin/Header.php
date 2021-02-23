<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use App\Models\Log_model;
use Image;

class Header extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$header 	= DB::table('header')->orderBy('judul_header','ASC')->get();

        $data = array(  'title'         => 'Header Halaman',
                        'breadcrumb'    => 'Header',
						'header'	    => $header,
                        'content'       => 'admin/header/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'judul_header' => 'required|unique:header',
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
        DB::table('header')->insert([
            'judul_header' => $request->judul_header,
            'keterangan'    => $request->keterangan,
            'gambar'        => $input['nama_file'],
            'halaman'       => $request->halaman
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data header: $request->judul_header";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/header')->with(['sukses' => 'Data telah ditambahkan']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'judul_header' => 'required',
					        'judul_header'               => 'required',
                            'gambar'               => 'file|image|mimes:jpeg,png,jpg|max:8024',
					        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            // UPLOAD START
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
            $slug_header = Str::slug($request->judul_header, '-');
            DB::table('header')->where('id_header',$request->id_header)->update([
                'judul_header' => $request->judul_header,
                'keterangan'    => $request->keterangan,
                'gambar'        => $input['nama_file'],
                'halaman'       => $request->halaman
            ]);
        }else{
            $slug_header = Str::slug($request->judul_header, '-');
            DB::table('header')->where('id_header',$request->id_header)->update([
                'judul_header' => $request->judul_header,
                'keterangan'    => $request->keterangan,
                // 'gambar'        => $input['nama_file'],
                'halaman'       => $request->halaman
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data header: $request->judul_header";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/header')->with(['sukses' => 'Data telah diperbarui']);
    }

    // Delete
    public function delete($id_header)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	// hapus file
	    $img = DB::table('header')->where('id_header',$id_header)->first();
	    File::delete('./public/uploads/image/'.$img['gambar']);
        File::delete('./public/uploads/image/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
        DB::table('header')->where('id_header',$id_header)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data header id: $id_header";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
    	return redirect('admin/header')->with(['sukses' => 'Data telah dihapus']);
    }
}
