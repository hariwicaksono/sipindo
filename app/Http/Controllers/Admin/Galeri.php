<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use App\Models\Galeri_model;
use App\Models\Log_model;
use Image;


class Galeri extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mygaleri 			= new Galeri_model();
		$galeri 			= $mygaleri->semua();
		$kategori_galeri 	= DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Galeri',
        'breadcrumb' => 'Galeri & Banner',
						'galeri'			=> $galeri,
                        'galeris'			=> $galeri,
						'kategori_galeri'	=> $kategori_galeri,
                        'content'			=> 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $keywords           = $request->keywords;
        $galeri             = $mygaleri->cari($keywords);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Galeri',
                        'galeri'            => $galeri,
                        'galeris'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_galerinya       = $request->id_galeri;
            for($i=0; $i < sizeof($id_galerinya);$i++) {
                DB::table('galeri')->where('id_galeri',$id_galerinya[$i])->delete();
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Hapus data galeri: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/galeri')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_galerinya       = $request->id_galeri;
            for($i=0; $i < sizeof($id_galerinya);$i++) {
                DB::table('galeri')->where('id_galeri',$id_galerinya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_galeri'    => $request->id_kategori_galeri
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data galeri: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/galeri')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_galeri($status_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $galeri             = $mygaleri->status_galeri($status_galeri);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Galeri',
                        'galeri'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $galeri             = $mygaleri->all_kategori_galeri($id_kategori_galeri);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Galeri',
                        'galeri'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Galeri',
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $galeri             = $mygaleri->detail($id_galeri);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Galeri',
                        'galeri'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_galeri'  => 'required|unique:galeri',
                            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath        = './public/uploads/image/gallery/thumbs/';
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = './public/uploads/image/gallery/';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        $slug_nama_galeri = Str::slug($request->nama_galeri, '-');

        DB::table('galeri')->insert([
            'id_user'               => Session()->get('id_user'),
            'id_kategori_galeri'    => $request->id_kategori_galeri,
            'id_user'               => Session()->get('id_user'),
            'judul_galeri'          => $request->judul_galeri,
            'isi'                   => $request->isi,
            'jenis_galeri'          => $request->jenis_galeri,
            'gambar'                => $input['nama_file'],
            'website'               => $request->website,
            'status_text'           => $request->status_text,
            'urutan'                => $request->urutan
        ]);
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data galeri: $request->judul_galeri";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/galeri')->with(['sukses' => 'Data telah ditambahkan']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_galeri'  => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/gallery/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/gallery/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_nama_galeri = Str::slug($request->nama_galeri, '-');

            DB::table('galeri')->where('id_galeri',$request->id_galeri)->update([
                'id_user'               => Session()->get('id_user'),
                'judul_galeri'          => $request->judul_galeri,
                'isi'                   => $request->isi,
                'jenis_galeri'          => $request->jenis_galeri,
                'gambar'                => $input['nama_file'],
                'website'               => $request->website,
                'status_text'           => $request->status_text,
                'urutan'                => $request->urutan
            ]);
        }else{
            $slug_nama_galeri = Str::slug($request->nama_galeri, '-');
            
            DB::table('galeri')->where('id_galeri',$request->id_galeri)->update([
                'id_user'               => Session()->get('id_user'),
                'judul_galeri'          => $request->judul_galeri,
                'isi'                   => $request->isi,
                'jenis_galeri'          => $request->jenis_galeri,
                'website'               => $request->website,
                'status_text'           => $request->status_text,
                'urutan'                => $request->urutan
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data galeri: $request->judul_galeri";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/galeri')->with(['sukses' => 'Data telah diperbarui']);
    }

    // Delete
    public function delete($id_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        // hapus file
	    $img = Galeri_model::where('id_galeri',$id_galeri)->first();
	    File::delete('./public/uploads/image/gallery/'.$img['gambar']);
        File::delete('./public/uploads/image/gallery/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
	    Galeri_model::where('id_galeri',$id_galeri)->delete();
        //DB::table('galeri')->where('id_galeri',$id_galeri)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data galeri id: $id_galeri";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
        return redirect('admin/galeri')->with(['sukses' => 'Data telah dihapus']);
    }
}
