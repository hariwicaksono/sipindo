<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 
use App\Helpers\Website;

class Log_model extends Model
{

     // listing
     public function semua_log_aktivitas()
     {
         $query = DB::table('log_aktivitas')
             ->select('*')
             ->orderBy('tanggal','DESC')
             ->get();
         return $query;
     }

     public function semua_log_user()
     {
         $query = DB::table('log_users')
             ->select('*')
             ->orderBy('tanggal','DESC')
             ->get();
         return $query;
     }

	// log
    public function login_log($username)
    {
        $query = DB::table('log_users')->insert([
            'username' => $username,
            'tanggal'    => date('Y-m-d H:i:s'),
            'keterangan' => 'login',
            'ip_address' => getUserIpAddr()
            
        ]);
        return $query;
    } 

    public function logout_log($username)
    {
        $query = DB::table('log_users')->insert([
            'username' => $username,
            'tanggal'    => date('Y-m-d H:i:s'),
            'keterangan' => 'logout',
            'ip_address' => getUserIpAddr()
            
        ]);
        return $query;
    }

    public function aktivitas_log($username, $keterangan)
    {
        $query = DB::table('log_aktivitas')->insert([
            'username' => $username,
            'tanggal'    => date('Y-m-d H:i:s'),
            'keterangan' => $keterangan,
            'ip_address' => getUserIpAddr()
            
        ]);
        return $query;
    }
}
