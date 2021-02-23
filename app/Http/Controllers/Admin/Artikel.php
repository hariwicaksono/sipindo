<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Artikel_model;
use App\Models\Log_model;
use Image;
use DataTables;

class Artikel extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myartikel 	= new Artikel_model();
		$artikel 	= $myartikel->artikel_update();
		$kategori 	= DB::table('kategori')->orderBy('urutan','ASC')->get();
        $font = DB::table('fonts')->orderBy('id_font','ASC')->get();

        $data = array(  'title'       => 'Data Artikel',
        'breadcrumb' => 'Artikel',
						'artikel'      => $artikel,
                        'artikels'      => $artikel,
						'kategori'    => $kategori,
                        'font' => $font,
                        'content'     => 'admin/artikel/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
	
	public function json(){
        return Datatables::of(Artikel_model::all())->make(true);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myartikel           = new Artikel_model();
        $keywords           = $request->keywords;
        $artikel             = $myartikel->cari($keywords);
        $kategori           = DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Artikel',
                        'artikel'            => $artikel,
                        'artikels'      => $artikel,
                        'kategori'   => $kategori,
                        'content'           => 'admin/artikel/index'
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
            $id_artikelnya       = $request->id_artikel;
            for($i=0; $i < sizeof($id_artikelnya);$i++) {
                DB::table('artikel')->where('id_artikel',$id_artikelnya[$i])->delete();
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Hapus data artikel: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_artikelnya       = $request->id_artikel;
            for($i=0; $i < sizeof($id_artikelnya);$i++) {
                DB::table('artikel')->where('id_artikel',$id_artikelnya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_artikel' => 'Draft'
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update Draf data artikel: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_artikelnya       = $request->id_artikel;
            for($i=0; $i < sizeof($id_artikelnya);$i++) {
                DB::table('artikel')->where('id_artikel',$id_artikelnya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_artikel' => 'Publish'
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update Publish data artikel: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_artikelnya       = $request->id_artikel;
            for($i=0; $i < sizeof($id_artikelnya);$i++) {
                DB::table('artikel')->where('id_artikel',$id_artikelnya[$i])->update([
                        'id_user'        => Session()->get('id_user'),
                        'id_kategori'    => $request->id_kategori
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data artikel: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_artikel($status_artikel)
    { 
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $myartikel    = new Artikel_model();
        $artikel      = $myartikel->status_artikel($status_artikel);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Status Artikel: '.$status_artikel,
                        'artikel'            => $artikel,
                        'kategori'   => $kategori,
                        'content'           => 'admin/artikel/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_artikel($jenis_artikel)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $myartikel    = new Artikel_model();
        $artikel      = $myartikel->jenis_artikel($jenis_artikel);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Jenis '.$jenis_artikel,
                        'artikel'            => $artikel,
                        'kategori'   => $kategori,
                        'content'           => 'admin/artikel/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $myartikel           = new Artikel_model();
        $artikel             = $myartikel->author($id_user);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();
        $author    = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data Artikel dengan Penulis: '.$author->nama,
                        'artikel'            => $artikel,
                        'kategori'   => $kategori,
                        'content'           => 'admin/artikel/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Paginator::useBootstrap();
        $myartikel    = new Artikel_model();
        $artikel      = $myartikel->all_kategori($id_kategori);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategori')->where('id_kategori',$id_kategori)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kategori,
        
                        'artikel'            => $artikel,
                        'kategori'   => $kategori,
                        'content'           => 'admin/artikel/index'
                    );
        return view('admin/layout/wrapper',$data);
    }


    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_artikel'  => 'required|unique:artikel',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/image/artikel/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_artikel = Str::slug($request->judul_artikel, '-');
            DB::table('artikel')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_font'       => $request->id_font,
                'id_user'           => Session()->get('id_user'),
                'slug_artikel'       => $slug_artikel,
                'judul_artikel'      => $request->judul_artikel,
                'judul_artikel_en'      => $request->judul_artikel_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_artikel'      => $request->jenis_artikel,
                'status_artikel'     => $request->status_artikel,
                'gambar'            => $input['nama_file'],
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            $slug_artikel = Str::slug($request->judul_artikel, '-');
            DB::table('artikel')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_font'       => $request->id_font,
                'id_user'           => Session()->get('id_user'),
                'slug_artikel'       => $slug_artikel,
                'judul_artikel'      => $request->judul_artikel,
                'judul_artikel_en'      => $request->judul_artikel_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_artikel'      => $request->jenis_artikel,
                'status_artikel'     => $request->status_artikel,
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data artikel: $request->judul_artikel";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/artikel')->with(['sukses' => 'Data telah ditambahkan']);

    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_artikel'   => 'required',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/image/artikel/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './assets/upload/image/artikel/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_artikel = Str::slug($request->judul_artikel, '-');
            DB::table('artikel')->where('id_artikel',$request->id_artikel)->update([
                'id_kategori'       => $request->id_kategori,
                'id_font'       => $request->id_font,
                'id_user'           => Session()->get('id_user'),
                'slug_artikel'       => $slug_artikel,
                'judul_artikel'      => $request->judul_artikel,
                'judul_artikel_en'      => $request->judul_artikel_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'status_artikel'     => $request->status_artikel,
                'gambar'            => $input['nama_file'],
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'tanggal_diubah' => date('Y-m-d H:i:s'),
                'urutan'            => $request->urutan
            ]);
        }else{
            $slug_artikel = Str::slug($request->judul_artikel, '-');
            DB::table('artikel')->where('id_artikel',$request->id_artikel)->update([
                'id_kategori'       => $request->id_kategori,
                'id_font'       => $request->id_font,
                'id_user'           => Session()->get('id_user'),
                'slug_artikel'       => $slug_artikel,
                'judul_artikel'      => $request->judul_artikel,
                'judul_artikel_en'      => $request->judul_artikel_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'status_artikel'     => $request->status_artikel,
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'tanggal_diubah' => date('Y-m-d H:i:s'),
                'urutan'            => $request->urutan
            ]);
        }
        
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data artikel: $request->id_artikel";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/artikel')->with(['sukses' => 'Data telah diperbarui']);

   
    }

    // Delete
    public function delete($id_artikel)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        // hapus file
	    $img = Artikel_model::where('id_artikel',$id_artikel)->first();
	    File::delete('./public/uploads/image/artikel/'.$img['gambar']);
        File::delete('./public/uploads/image/artikel/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
	    Artikel_model::where('id_artikel',$id_artikel)->delete();
        //DB::table('artikel')->where('id_artikel',$id_artikel)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data artikel id: $id_artikel";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
        return redirect('admin/artikel')->with(['sukses' => 'Data telah dihapus']);
    }
}
