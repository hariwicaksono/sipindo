<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Layanan_model;
use App\Models\Log_model;
use Image;
use DataTables;  

class Layanan extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mylayanan 	= new Layanan_model();
		$layanan 	= $mylayanan->layanan_update();
		$kategori 	= DB::table('kategori_layanan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'       => 'Data Layanan',
        'breadcrumb' => 'Layanan',
						'layanan'      => $layanan,
                        'layanans'      => $layanan,
						'kategori'    => $kategori,
                        'content'     => 'admin/layanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
	
	public function json(){
        return Datatables::of(Layanan_model::all())->make(true);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mylayanan           = new Layanan_model();
        $keywords           = $request->keywords;
        $layanan             = $mylayanan->cari($keywords);
        $kategori           = DB::table('kategori_layanan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Layanan',
                        'layanan'            => $layanan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/layanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site           = DB::table('konfigurasi')->first();
        $pengalihan     = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_layanannya       = $request->id_layanan;
            for($i=0; $i < sizeof($id_layanannya);$i++) {
                DB::table('layanan')->where('id_layanan',$id_layanannya[$i])->delete();
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Hapus data layanan: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_layanannya       = $request->id_layanan;
            for($i=0; $i < sizeof($id_layanannya);$i++) {
                DB::table('layanan')->where('id_layanan',$id_layanannya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_layanan' => 'Draft'
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data layanan: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_layanannya       = $request->id_layanan;
            for($i=0; $i < sizeof($id_layanannya);$i++) {
                DB::table('layanan')->where('id_layanan',$id_layanannya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_layanan' => 'Publish'
                    ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_layanannya       = $request->id_layanan;
            for($i=0; $i < sizeof($id_layanannya);$i++) {
                DB::table('layanan')->where('id_layanan',$id_layanannya[$i])->update([
                        'id_user'        => Session()->get('id_user'),
                        'id_kategori'    => $request->id_kategori
                    ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_layanan($status_layanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mylayanan    = new Layanan_model();
        $layanan      = $mylayanan->status_layanan($status_layanan);
        $kategori    = DB::table('kategori_layanan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Status Layanan: '.$status_layanan,
                        'layanan'            => $layanan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/layanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_layanan($jenis_layanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mylayanan    = new Layanan_model();
        $layanan      = $mylayanan->jenis_layanan($jenis_layanan);
        $kategori    = DB::table('kategori_layanan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Jenis '.$jenis_layanan,
                        'layanan'            => $layanan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/layanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mylayanan           = new Layanan_model();
        $layanan             = $mylayanan->author($id_user);
        $kategori    = DB::table('kategori_layanan')->orderBy('urutan','ASC')->get();
        $author    = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data Layanan dengan Penulis: '.$author->nama,
                        'layanan'            => $layanan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/layanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $mylayanan    = new Layanan_model();
        $layanan      = $mylayanan->all_kategori($id_kategori);
        $kategori    = DB::table('kategori_layanan')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategori_layanan')->where('id_kategori',$id_kategori)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kategori,
        
                        'layanan'            => $layanan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/layanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function proses_tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_layanan'  => 'required|unique:layanan',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/layanan/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/layanan/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_layanan = Str::slug($request->judul_layanan, '-');
            DB::table('layanan')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_layanan'       => $slug_layanan,
                'judul_layanan'      => $request->judul_layanan,
                'judul_layanan_en'      => $request->judul_layanan_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_layanan'      => $request->jenis_layanan,
                'status_layanan'     => $request->status_layanan,
                'gambar'            => $input['nama_file'],
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            $slug_layanan = Str::slug($request->judul_layanan, '-');
            DB::table('layanan')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_layanan'       => $slug_layanan,
                'judul_layanan'      => $request->judul_layanan,
                'judul_layanan_en'      => $request->judul_layanan_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_layanan'      => $request->jenis_layanan,
                'status_layanan'     => $request->status_layanan,
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        if($request->jenis_layanan=="Layanan") {
            $username = Session()->get('username');
            $keterangan = "Melakukan Tambah data layanan: $request->judul_layanan";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/layanan')->with(['sukses' => 'Data telah ditambahkan']);
        }else{
            $username = Session()->get('username');
            $keterangan = "Melakukan Tambah data layanan: $request->judul_layanan";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/layanan')->with(['sukses' => 'Data telah ditambahkan']);
        }
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_layanan'   => 'required',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/layanan/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/layanan/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_layanan = Str::slug($request->judul_layanan, '-');
            DB::table('layanan')->where('id_layanan',$request->id_layanan)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_layanan'       => $slug_layanan,
                'judul_layanan'      => $request->judul_layanan,
                'judul_layanan_en'      => $request->judul_layanan_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_layanan'      => $request->jenis_layanan,
                'status_layanan'     => $request->status_layanan,
                'gambar'            => $input['nama_file'],
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }else{
            $slug_layanan = Str::slug($request->judul_layanan, '-');
            DB::table('layanan')->where('id_layanan',$request->id_layanan)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_layanan'       => $slug_layanan,
                'judul_layanan'      => $request->judul_layanan,
                'judul_layanan_en'      => $request->judul_layanan_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_layanan'      => $request->jenis_layanan,
                'status_layanan'     => $request->status_layanan,
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }
        
            if($request->jenis_layanan=="Layanan") {
                $username = Session()->get('username');
            $keterangan = "Melakukan Update data layanan: $request->judul_layanan";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
                return redirect('admin/layanan')->with(['sukses' => 'Data telah diperbarui']);
            }else{
                $username = Session()->get('username');
                $keterangan = "Melakukan Update data layanan: $request->judul_layanan";
                $model = new Log_model();
                $log = $model->aktivitas_log($username, $keterangan);
                return redirect('admin/layanan')->with(['sukses' => 'Data telah diupdate']);
            } 
   
    }

    // Delete
    public function delete($id_layanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        // hapus file
	    $img = Layanan_model::where('id_layanan',$id_layanan)->first();
	    File::delete('./public/uploads/image/layanan/'.$img['gambar']);
        File::delete('./public/uploads/image/layanan/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
	    Layanan_model::where('id_layanan',$id_layanan)->delete();
        //DB::table('layanan')->where('id_layanan',$id_layanan)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data layanan id: $id_layanan";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        //return redirect('admin/layanan')->with(['sukses' => 'Data telah dihapus']);
        }
        return redirect('admin/layanan')->with(['sukses' => 'Data telah dihapus']);
    }
}
