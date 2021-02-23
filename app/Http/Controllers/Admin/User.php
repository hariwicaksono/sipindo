<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Log_model;
use Image;

class User extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$user 	= DB::table('users')->orderBy('id_user','DESC')->get();
 
        $data = array(  'title'     => 'Pengguna Sistem',
                        'breadcrumb' => 'Pengguna',
						'user'      => $user,
                        'content'   => 'admin/user/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function proses_tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
                            'nama'     => 'required',
					        'username' => 'required|unique:users',
					        'password' => 'required',
                            'email'    => 'required',
                            'gambar'   => 'file|image|mimes:jpeg,png,jpg|max:8024',
					        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/user/thumbs/';
            $img  = Image::make($image->getRealPath())->resize(150, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/user/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('users')->insert([
                'nama'          => $request->nama,
                'email'	        => $request->email,
                'username'   	=> $request->username,
                'password'      => sha1($request->password),
                'akses_level'   => $request->akses_level,
                'kode_rahasia'   => $request->password,
                'gambar'        => $input['nama_file']
            ]);
            $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data pengguna sistem: $request->username";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/user')->with(['sukses' => 'Data telah ditambahkan']);
        }else{
             DB::table('users')->insert([
                'nama'          => $request->nama,
                'email'         => $request->email,
                'username'      => $request->username,
                'password'      => sha1($request->password),
                'akses_level'   => $request->akses_level,
                'kode_rahasia'      => $request->password
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data pengguna sistem: $request->username";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/user')->with(['sukses' => 'Data telah ditambahkan']);
    }

    // edit
    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama'     => 'required',
                            'username' => 'required',
                            'email'    => 'required',
                            'gambar'   => 'file|image|mimes:jpeg,png,jpg|max:8024',
					        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            // UPLOAD START
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/user/thumbs/';
            $img  = Image::make($image->getRealPath())->resize(150, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/user/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_user = Str::slug($request->nama, '-');
            DB::table('users')->where('id_user',$request->id_user)->update([
                'nama'          => $request->nama,
                'email'         => $request->email,
                'username'      => $request->username,
                'akses_level'   => $request->akses_level,
                'gambar'        => $input['nama_file']
            ]);
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data pengguna sistem: $request->username";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect('admin/user')->with(['sukses' => 'Data telah diperbarui']);
        }else{
            $slug_user = Str::slug($request->nama, '-');
            DB::table('users')->where('id_user',$request->id_user)->update([
                'nama'          => $request->nama,
                'email'         => $request->email,
                'username'      => $request->username,
                'akses_level'   => $request->akses_level
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data pengguna sistem: $request->username";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/user')->with(['sukses' => 'Data telah diperbarui']);
    }

    public function proses_password(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
                            'password' => 'required',
					        ]);
 
        DB::table('users')->where('id_user',$request->id_user)->update([
            'password'      => sha1($request->password),
            'kode_rahasia'      => $request->password
        ]);
  
        $username = Session()->get('username');
        $keterangan = "Melakukan Update Password data pengguna sistem: $request->username";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/user')->with(['sukses' => 'Password telah diganti']);
    }

    // Delete
    public function delete($id_user)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	// hapus file
	    $img = DB::table('users')->where('id_user',$id_user)->first();
	    File::delete('./public/uploads/user/'.$img['gambar']);
        File::delete('./public/uploads/user/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
        DB::table('users')->where('id_user',$id_user)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data pengguna sistem id: $id_user";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
    	return redirect('admin/user')->with(['sukses' => 'Data telah dihapus']);
    }
}
