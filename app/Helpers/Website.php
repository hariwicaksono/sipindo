<?php
use Illuminate\Support\Facades\DB;

function website($perintah='')
{
	// Load model
	$site = DB::table('konfigurasi')->first();
	// User
	if($perintah=='lengkap') {
		$hasil = $site->namaweb.' | '.$site->tagline;
	}elseif($perintah=="tagline") {
		$hasil = $site->tagline;
	}elseif($perintah=="logo") {
		$hasil = $site->logo;
	}elseif($perintah=="icon") {
		$hasil = $site->icon;
	}else{
		$hasil = $site->namaweb;
	}
	// Output
	return $hasil;
}

function getUserIpAddr(){
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';    
	return $ipaddress;
 }
