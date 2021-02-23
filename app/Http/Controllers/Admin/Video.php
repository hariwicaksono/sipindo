<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use App\Models\Video_model;
use App\Models\Log_model;
use Image;

class Video extends Controller 
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $video   = DB::table('video')->orderBy('id_video','DESC')->paginate(5);

        $data = array(  'title'     => 'Data Video',
        'breadcrumb' => 'Video',
                        'video'  => $video,
                        'videos'  => $video,
                        'content'   => 'admin/video/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $model           = new Video_model();
        $keywords           = $request->keywords;
        $video             = $model->cari($keywords);

        $data = array(  'title'             => 'Data Video',
        'breadcrumb' => 'Video',
                        'video'            => $video,
                        'videos'            => $video,
                        'content'           => 'admin/video/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
 
    // Edit
    public function edit($id_video)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $video   = DB::table('video')->where('id_video',$id_video)->orderBy('urutan','ASC')->first();

        $data = array(  'title'     => 'Edit Data Video',
                        'video'     => $video,
                        'content'   => 'admin/video/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_videonya       = $request->id_video;
            for($i=0; $i < sizeof($id_videonya);$i++) {
                DB::table('video')->where('id_video',$id_videonya[$i])->delete();
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Hapus data video: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_videonya       = $request->id_video;
            for($i=0; $i < sizeof($id_videonya);$i++) {
                DB::table('video')->where('id_video',$id_videonya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'aktif' => '0'
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update Tidak Aktif data video: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data telah diubah menjadi Tidak Aktif']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_videonya       = $request->id_video;
            for($i=0; $i < sizeof($id_videonya);$i++) {
                DB::table('video')->where('id_video',$id_videonya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'aktif' => '1'
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update Aktif data video: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data telah diubah menjadi Aktif']);
        }elseif(isset($_POST['update'])) {
            $id_videonya       = $request->id_video;
            for($i=0; $i < sizeof($id_videonya);$i++) {
                DB::table('video')->where('id_video',$id_videonya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'live'    => $request->is_live
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data galeri: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data status video telah diperbarui']);
        }
    }

    // tambah
    public function proses_tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul'     => 'required|unique:video',
                            'video'     => 'required|unique:video',
                            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:8024'
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/video/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/video/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            // UPLOAD START       
            DB::table('video')->insert([
                'judul'         => $request->judul,
                'judul_en'         => $request->judul_en,
                'posisi'        => $request->posisi,
                'keterangan'    => $request->keterangan,
                'keterangan_en'    => $request->keterangan_en,
                'video'         => $request->video,
                'urutan'        => $request->urutan,
                'id_user'       => Session()->get('id_user'),
                'live'        => $request->live,
                'aktif'        => $request->aktif,
                'gambar'        => $input['nama_file']
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Tambah data video: $request->video";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data telah ditambahkan']);

            }else{
            // UPLOAD START       
            DB::table('video')->insert([
                'judul'         => $request->judul,
                'judul_en'         => $request->judul_en,
                'posisi'        => $request->posisi,
                'keterangan'    => $request->keterangan,
                'keterangan_en'    => $request->keterangan_en,
                'video'         => $request->video,
                'urutan'        => $request->urutan,
                'id_user'       => Session()->get('id_user'),
                'live'        => $request->live ,
                'aktif'        => $request->aktif
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Tambah data video: $request->video";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data telah ditambahkan']);
        }
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                           'judul'      => 'required',
                            'video'     => 'required',
                            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:8024'
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/video/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/video/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('video')->where('id_video',$request->id_video)->update([
                'judul'         => $request->judul,
                'judul_en'         => $request->judul_en,
                'posisi'        => $request->posisi,
                'keterangan'    => $request->keterangan,
                'keterangan_en'    => $request->keterangan_en,
                'video'         => $request->video,
                'urutan'        => $request->urutan,
                'id_user'       => Session()->get('id_user'),
                'bahasa'        => $request->bahasa,
                'live'        => $request->live,
                'aktif'        => $request->aktif,
                'gambar'            => $input['nama_file'],
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data video: $request->id_video";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data telah diperbarui']);
        }else{
            DB::table('video')->where('id_video',$request->id_video)->update([
                'judul'         => $request->judul,
                'judul_en'         => $request->judul_en,
                'posisi'        => $request->posisi,
                'keterangan'    => $request->keterangan,
                'keterangan_en'    => $request->keterangan_en,
                'video'         => $request->video,
                'urutan'        => $request->urutan,
                'id_user'       => Session()->get('id_user'),
                'live'        => $request->live,
                'aktif'        => $request->aktif
            ]);
            $username = Session()->get('username');
        $keterangan = "Melakukan Update data video: $request->id_video";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/video')->with(['sukses' => 'Data telah diperbarui']);
        }
    }

    // Delete
    public function delete($id_video)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        // hapus file
	    $img = Video_model::where('id_video',$id_video)->first();
	    File::delete('./public/uploads/image/video/'.$img['gambar']);
        File::delete('./public/uploads/image/video/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
	    Video_model::where('id_video',$id_video)->delete();
        //DB::table('video')->where('id_video',$id_video)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data video id: $id_video";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
        return redirect('admin/video')->with(['sukses' => 'Data telah dihapus']);
    }
}
