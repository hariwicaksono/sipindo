<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use App\Models\Testimonial_model;
use App\Models\Log_model;
use Image;

class Testimonial extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $testimonial   = DB::table('testimonial')->orderBy('id_testimonial','DESC')->get();

        $data = array(  'title'     => 'Data Testimonial',
                        'breadcrumb' => 'Testimonial',
                        'testimonial'  => $testimonial,
                        'content'   => 'admin/testimonial/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id_testimonial)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $testimonial   = DB::table('testimonial')->where('id_testimonial',$id_testimonial)->orderBy('id_testimonial','DESC')->first();

        $data = array(  'title'     => 'Edit Data Testimonial',
                        'breadcrumb' => 'Testimonial',
                        'testimonial'     => $testimonial,
                        'content'   => 'admin/testimonial/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }
 
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_testimonialnya       = $request->id_testimonial;
            for($i=0; $i < sizeof($id_testimonialnya);$i++) {
                DB::table('testimonial')->where('id_testimonial',$id_testimonialnya[$i])->delete();
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Hapus data testimoni: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/testimonial')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }

    // tambah
    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama'     => 'required',
                            'perusahaan'     => 'required',
                            'keterangan'     => 'required',
                            'gambar'    => 'required|file|image|mimes:jpeg,png,jpg|max:8024'
                            ]);
        // UPLOAD START 
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/testimonials/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/testimonials/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            // UPLOAD START       
            DB::table('testimonial')->insert([
                'nama'         => $request->nama,
                'perusahaan'   => $request->perusahaan,
                'keterangan'    => $request->keterangan,
                'gambar'        => $input['nama_file'],
                'id_user'       => Session()->get('id_user')
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Tambah data testimoni: $request->nama";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/testimonial')->with(['sukses' => 'Data telah ditambahkan']);
        }else{
            // UPLOAD START       
            DB::table('testimonial')->insert([
                'nama'         => $request->nama,
                'perusahaan'    => $request->perusahaan,
                'keterangan'    => $request->keterangan,
                'gambar'        => $input['nama_file'],
                'id_user'       => Session()->get('id_user')
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Tambah data testimoni: $request->nama";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/testimonial')->with(['sukses' => 'Data telah ditambah']);
        }
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                           'nama'      => 'required',
                            'perusahaan'     => 'required',
                            'keterangan'     => 'required',
                            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:8024'
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/testimonials/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/testimonials/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('testimonial')->where('id_testimonial',$request->id_testimonial)->update([
                'nama'         => $request->nama,
                'perusahaan'    => $request->perusahaan,
                'keterangan'    => $request->keterangan,
                'gambar'            => $input['nama_file'],
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data testimoni: $request->nama";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/testimonial')->with(['sukses' => 'Data telah diperbarui']);
        }else{
            DB::table('testimonial')->where('id_testimonial',$request->id_testimonial)->update([
                'nama'         => $request->nama,
                'perusahaan'        => $request->perusahaan,
                'keterangan'    => $request->keterangan,
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data testimoni: $request->nama";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/testimonial')->with(['sukses' => 'Data telah diperbarui']);
        }
    }

    // Delete
    public function delete($id_testimonial)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $img = DB::table('testimonial')->where('id_testimonial',$id_testimonial)->first();
	    File::delete('./public/uploads/image/testimonials/'.$img['gambar']);
        File::delete('./public/uploads/image/testimonials/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
	    DB::table('testimonial')->where('id_testimonial',$id_testimonial)->delete();
        //DB::table('testimonial')->where('id_testimonial',$id_testimonial)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data testimoni id: $id_testimonial";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
        return redirect('admin/testimonial')->with(['sukses' => 'Data telah dihapus']);
    }
}
