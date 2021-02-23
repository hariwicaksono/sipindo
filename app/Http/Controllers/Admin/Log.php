<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Log_model;
use Image;

class Log extends Controller
{
    // Index
    public function log_aktivitas()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$model 	= new Log_model;
        $log = $model->semua_log_aktivitas();
 
        $data = array(  'title'     => 'Log Aktivitas Sistem',
                        'breadcrumb' => 'Aktivitas Log',
						'log'      => $log,
                        'content'   => 'admin/log/aktivitas'
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function log_users()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$model 	= new Log_model;
        $log = $model->semua_log_user();
 
        $data = array(  'title'     => 'Log Users',
                        'breadcrumb' => 'Users Log',
						'log'      => $log,
                        'content'   => 'admin/log/users'
                    );
        return view('admin/layout/wrapper',$data);
    }

}
