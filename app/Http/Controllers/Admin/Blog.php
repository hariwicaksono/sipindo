<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Blog_model;
use App\Models\Log_model;
use Image;

class Blog extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //Paginator::useBootstrap();
    	$myblog 	= new Blog_model();
		$blog 	= $myblog->Blog_update();
		$kategori 	= DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'       => 'Data Blog',
        'breadcrumb'  => 'Blog',
						'blog'      => $blog,
                        'blogs'      => $blog,
						'kategori'    => $kategori,
                        'content'     => 'admin/blog/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myblog           = new Blog_model();
        $keywords           = $request->keywords;
        $blog             = $myblog->cari($keywords);
        $kategori           = DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data blog',
                        'blog'            => $blog,
                        'kategori'   => $kategori,
                        'content'           => 'admin/blog/index'
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
            $id_blognya       = $request->id_blog;
            for($i=0; $i < sizeof($id_blognya);$i++) {
                DB::table('blog')->where('id_blog',$id_blognya[$i])->delete();
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Hapus data blog: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_blognya       = $request->id_blog;
            for($i=0; $i < sizeof($id_blognya);$i++) {
                DB::table('blog')->where('id_blog',$id_blognya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_blog' => 'Draft'
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update Draft data blog: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_blognya       = $request->id_blog;
            for($i=0; $i < sizeof($id_blognya);$i++) {
                DB::table('blog')->where('id_blog',$id_blognya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_blog' => 'Publish'
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update Publish data blog: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_blognya       = $request->id_blog;
            for($i=0; $i < sizeof($id_blognya);$i++) {
                DB::table('blog')->where('id_blog',$id_blognya[$i])->update([
                        'id_user'        => Session()->get('id_user'),
                        'id_kategori'    => $request->id_kategori
                    ]);
            }
            $username = Session()->get('username');
            $keterangan = "Melakukan Update data blog: Multiple";
            $model = new Log_model();
            $log = $model->aktivitas_log($username, $keterangan);
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_blog($status_blog)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //Paginator::useBootstrap();
        $myblog    = new Blog_model();
        $blog      = $myblog->status_blog($status_blog);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Status blog: '.$status_blog,
                        'blog'            => $blog,
                        'kategori'   => $kategori,
                        'content'           => 'admin/blog/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_blog($jenis_blog)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //Paginator::useBootstrap();
        $myblog    = new Blog_model();
        $blog      = $myblog->jenis_blog($jenis_blog);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Jenis blog: '.$jenis_blog,
                        'blog'            => $blog,
                        'kategori'   => $kategori,
                        'content'           => 'admin/blog/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //Paginator::useBootstrap();
        $myblog           = new Blog_model();
        $blog             = $myblog->author($id_user);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();
        $author    = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data blog dengan Penulis: '.$author->nama,
                        'blog'            => $blog,
                        'kategori'   => $kategori,
                        'content'           => 'admin/blog/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        //Paginator::useBootstrap();
        $myblog    = new Blog_model();
        $blog      = $myblog->all_kategori($id_kategori);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategori')->where('id_kategori',$id_kategori)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kategori,
                        'blog'            => $blog,
                        'kategori'   => $kategori,
                        'content'           => 'admin/blog/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function proses_tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_blog'  => 'required|unique:blog',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/blog/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/blog/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_blog = Str::slug($request->judul_blog, '-');
            DB::table('blog')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_blog'       => $slug_blog,
                'judul_blog'      => $request->judul_blog,
                'judul_blog_en'      => $request->judul_blog_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_blog'      => $request->jenis_blog,
                'status_blog'     => $request->status_blog,
                'gambar'            => $input['nama_file'],
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            $slug_blog = Str::slug($request->judul_blog, '-');
            DB::table('blog')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_blog'       => $slug_blog,
                'judul_blog'      => $request->judul_blog,
                'judul_blog_en'      => $request->judul_blog_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'jenis_blog'      => $request->jenis_blog,
                'status_blog'     => $request->status_blog,
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Tambah data blog: $request->judul_blog";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        return redirect('admin/blog')->with(['sukses' => 'Data telah ditambahkan']);
      
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_blog'   => 'required',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = './public/uploads/image/blog/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = './public/uploads/image/blog/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_blog = Str::slug($request->judul_blog, '-');
            DB::table('blog')->where('id_blog',$request->id_blog)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_blog'       => $slug_blog,
                'judul_blog'      => $request->judul_blog,
                'judul_blog_en'      => $request->judul_blog_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'status_blog'     => $request->status_blog,
                'gambar'            => $input['nama_file'],
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }else{
            $slug_blog = Str::slug($request->judul_blog, '-');
            DB::table('blog')->where('id_blog',$request->id_blog)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_blog'       => $slug_blog,
                'judul_blog'      => $request->judul_blog,
                'judul_blog_en'      => $request->judul_blog_en,
                'isi'               => $request->isi,
                'isi_en'               => $request->isi_en,
                'status_blog'     => $request->status_blog,
                //'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }
        $username = Session()->get('username');
        $keterangan = "Melakukan Update data blog: $request->judul_blog";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
         return redirect('admin/blog')->with(['sukses' => 'Data telah diperbarui']);
        
    }

    // Delete
    public function delete($id_blog)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        // hapus file
	    $img = Blog_model::where('id_blog',$id_blog)->first();
	    File::delete('./public/uploads/image/blog/'.$img['gambar']);
        File::delete('./public/uploads/image/blog/thumbs/'.$img['gambar']);
        if (!empty($img)) {
	    // hapus data
	    Blog_model::where('id_blog',$id_blog)->delete();
        //DB::table('blog')->where('id_blog',$id_blog)->delete();
        $username = Session()->get('username');
        $keterangan = "Melakukan Hapus data blog id: $id_blog";
        $model = new Log_model();
        $log = $model->aktivitas_log($username, $keterangan);
        }
        return redirect('admin/blog')->with(['sukses' => 'Data telah dihapus']);
    }
}
