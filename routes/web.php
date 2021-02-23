<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

/* FRONT END */
// Home
Route::get('admin/api/artikel/json','App\Http\Controllers\Admin\Artikel@json');
Route::get('/', 'App\Http\Controllers\Home@index');
Route::get('home', 'App\Http\Controllers\Home@index');
Route::get('kontak', 'App\Http\Controllers\Home@kontak');
Route::get('tentang-kami', 'App\Http\Controllers\Home@tentang');
Route::get('coba-sekarang', 'App\Http\Controllers\Home@coba');
Route::get('membership', 'App\Http\Controllers\Home@member');
Route::get('teritorial-mapping', 'App\Http\Controllers\Home@teritorial_mapping');
Route::get('market-price', 'App\Http\Controllers\Home@market_price');
// smartseeds
Route::get('smartseeds-dashboards', 'App\Http\Controllers\Smartseeds@index');
Route::get('smartseeds-dashboards/{par1}', 'App\Http\Controllers\Smartseeds@read');
// faq
Route::get('faq', 'App\Http\Controllers\Home@faq');
// Login
Route::get('login', 'App\Http\Controllers\Login@index');
Route::post('login/check', 'App\Http\Controllers\Login@check');
Route::get('login/forgot', 'App\Http\Controllers\Login@forgot');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');
// Artikel
Route::get('artikel', 'App\Http\Controllers\Artikel@index');
Route::get('artikel/cari', 'App\Http\Controllers\Artikel@cari');
Route::get('artikel/read/{par1}', 'App\Http\Controllers\Artikel@read');
Route::get('artikel/kategori/{par1}', 'App\Http\Controllers\Artikel@kategori');
// Blog
Route::get('blog', 'App\Http\Controllers\Blog@index');
Route::get('blog/read/{par1}', 'App\Http\Controllers\Blog@read');
Route::get('blog/kategori/{par1}', 'App\Http\Controllers\Blog@kategori');
// Layanan
Route::get('solusi-kami', 'App\Http\Controllers\Layanan@index');
Route::get('solusi-kami/{par1}', 'App\Http\Controllers\Layanan@read');
Route::get('solusi-kami/kategori/{par1}', 'App\Http\Controllers\Layanan@kategori');
// galeri
Route::get('galeri', 'App\Http\Controllers\Galeri@index');
Route::get('galeri/detail/{par1}', 'App\Http\Controllers\Galeri@detail');
// video
Route::get('video', 'App\Http\Controllers\Video@index');
Route::get('video/detail/{par1}', 'App\Http\Controllers\Video@detail');
/* END FRONT END */
/* BACK END */

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Admin\Dasbor@konfigurasi');
// user
Route::get('admin/user', 'App\Http\Controllers\Admin\User@index');
Route::post('admin/user/proses_tambah', 'App\Http\Controllers\Admin\User@proses_tambah');
Route::post('admin/user/proses_edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::post('admin/user/proses_password', 'App\Http\Controllers\Admin\User@proses_password');
Route::get('admin/user/delete/{par1}', 'App\Http\Controllers\Admin\User@delete');
// konfigurasi
Route::get('admin/konfigurasi', 'App\Http\Controllers\Admin\Konfigurasi@index');
Route::get('admin/konfigurasi/logo', 'App\Http\Controllers\Admin\Konfigurasi@logo');
Route::get('admin/konfigurasi/profil', 'App\Http\Controllers\Admin\Konfigurasi@profil');

Route::get('admin/konfigurasi/icon', 'App\Http\Controllers\Admin\Konfigurasi@icon');
Route::get('admin/konfigurasi/email', 'App\Http\Controllers\Admin\Konfigurasi@email');
Route::get('admin/konfigurasi/gambar', 'App\Http\Controllers\Admin\Konfigurasi@gambar');
Route::post('admin/konfigurasi/proses', 'App\Http\Controllers\Admin\Konfigurasi@proses');
Route::post('admin/konfigurasi/proses_logo', 'App\Http\Controllers\Admin\Konfigurasi@proses_logo');
Route::post('admin/konfigurasi/proses_icon', 'App\Http\Controllers\Admin\Konfigurasi@proses_icon');
Route::post('admin/konfigurasi/proses_email', 'App\Http\Controllers\Admin\Konfigurasi@proses_email');
Route::post('admin/konfigurasi/proses_gambar', 'App\Http\Controllers\Admin\Konfigurasi@proses_gambar');
Route::post('admin/konfigurasi/proses_profil', 'App\Http\Controllers\Admin\Konfigurasi@proses_profil');
//smartseed
Route::get('admin/smartseeds', 'App\Http\Controllers\Admin\Smartseeds@index');
Route::get('admin/smartseeds/konten', 'App\Http\Controllers\Admin\Smartseeds@konten');
Route::post('admin/smartseeds/proses_profil', 'App\Http\Controllers\Admin\Smartseeds@proses_profil');
Route::post('admin/smartseeds/proses_tambah', 'App\Http\Controllers\Admin\Smartseeds@proses_tambah');
Route::post('admin/smartseeds/proses_edit', 'App\Http\Controllers\Admin\Smartseeds@proses_edit');
Route::get('admin/smartseeds/delete/{par1}', 'App\Http\Controllers\Admin\Smartseeds@delete');
Route::post('admin/smartseeds/proses', 'App\Http\Controllers\Admin\Smartseeds@proses');
// artikel
Route::get('admin/artikel', 'App\Http\Controllers\Admin\Artikel@index');
Route::get('admin/artikel/cari', 'App\Http\Controllers\Admin\Artikel@cari');
Route::get('admin/artikel/status_artikel/{par1}', 'App\Http\Controllers\Admin\Artikel@status_artikel');
Route::get('admin/artikel/kategori/{par1}', 'App\Http\Controllers\Admin\Artikel@kategori');
Route::get('admin/artikel/jenis_artikel/{par1}', 'App\Http\Controllers\Admin\Artikel@jenis_artikel');
Route::get('admin/artikel/author/{par1}', 'App\Http\Controllers\Admin\Artikel@author');
Route::get('admin/artikel/tambah', 'App\Http\Controllers\Admin\Artikel@tambah');
Route::get('admin/artikel/edit/{par1}', 'App\Http\Controllers\Admin\Artikel@edit');
Route::get('admin/artikel/delete/{par1}/{par2}', 'App\Http\Controllers\Admin\Artikel@delete');
Route::post('admin/artikel/tambah_proses', 'App\Http\Controllers\Admin\Artikel@tambah_proses');
Route::post('admin/artikel/edit_proses', 'App\Http\Controllers\Admin\Artikel@edit_proses');
Route::post('admin/artikel/proses', 'App\Http\Controllers\Admin\Artikel@proses');
Route::get('admin/artikel/add', 'App\Http\Controllers\Admin\Artikel@add');
// layanan
Route::get('admin/layanan', 'App\Http\Controllers\Admin\Layanan@index');
Route::get('admin/layanan/cari', 'App\Http\Controllers\Admin\Layanan@cari');
Route::get('admin/layanan/status_layanan/{par1}', 'App\Http\Controllers\Admin\Layanan@status_layanan');
Route::get('admin/layanan/kategori/{par1}', 'App\Http\Controllers\Admin\Layanan@kategori');
Route::get('admin/layanan/jenis_layanan/{par1}', 'App\Http\Controllers\Admin\Layanan@jenis_layanan');
Route::get('admin/layanan/author/{par1}', 'App\Http\Controllers\Admin\Layanan@author');
Route::get('admin/layanan/delete/{par1}', 'App\Http\Controllers\Admin\Layanan@delete');
Route::post('admin/layanan/proses_tambah', 'App\Http\Controllers\Admin\Layanan@proses_tambah');
Route::post('admin/layanan/proses_edit', 'App\Http\Controllers\Admin\Layanan@proses_edit');
Route::post('admin/layanan/proses', 'App\Http\Controllers\Admin\Layanan@proses');
// blog
Route::get('admin/blog', 'App\Http\Controllers\Admin\Blog@index');
Route::get('admin/blog/cari', 'App\Http\Controllers\Admin\Blog@cari');
Route::get('admin/blog/status_blog/{par1}', 'App\Http\Controllers\Admin\Blog@status_blog');
Route::get('admin/blog/kategori/{par1}', 'App\Http\Controllers\Admin\Blog@kategori');
Route::get('admin/blog/jenis_blog/{par1}', 'App\Http\Controllers\Admin\Blog@jenis_blog');
Route::get('admin/blog/author/{par1}', 'App\Http\Controllers\Admin\Blog@author');
Route::get('admin/blog/delete/{par1}/{par2}', 'App\Http\Controllers\Admin\Blog@delete');
Route::post('admin/blog/proses_tambah', 'App\Http\Controllers\Admin\Blog@proses_tambah');
Route::post('admin/blog/proses_edit', 'App\Http\Controllers\Admin\Blog@proses_edit');
Route::post('admin/blog/proses', 'App\Http\Controllers\Admin\Blog@proses');
// kategori
Route::get('admin/kategori', 'App\Http\Controllers\Admin\Kategori@index');
Route::post('admin/kategori/tambah', 'App\Http\Controllers\Admin\Kategori@tambah');
Route::post('admin/kategori/edit', 'App\Http\Controllers\Admin\Kategori@edit');
Route::get('admin/kategori/delete/{par1}', 'App\Http\Controllers\Admin\Kategori@delete');
// header
Route::get('admin/header', 'App\Http\Controllers\Admin\Header@index');
Route::post('admin/header/tambah', 'App\Http\Controllers\Admin\Header@tambah');
Route::post('admin/header/edit', 'App\Http\Controllers\Admin\Header@edit');
Route::get('admin/header/delete/{par1}', 'App\Http\Controllers\Admin\Header@delete');
// video
Route::get('admin/video', 'App\Http\Controllers\Admin\Video@index');
Route::get('admin/video/cari', 'App\Http\Controllers\Admin\Video@cari');
Route::get('admin/video/edit/{par1}', 'App\Http\Controllers\Admin\Video@edit');
Route::post('admin/video/proses_tambah', 'App\Http\Controllers\Admin\Video@proses_tambah');
Route::post('admin/video/proses_edit', 'App\Http\Controllers\Admin\Video@proses_edit');
Route::get('admin/video/delete/{par1}', 'App\Http\Controllers\Admin\Video@delete');
Route::post('admin/video/proses', 'App\Http\Controllers\Admin\Video@proses');
// kategori_staff
Route::get('admin/kategori_staff', 'App\Http\Controllers\Admin\Kategori_staff@index');
Route::post('admin/kategori_staff/tambah', 'App\Http\Controllers\Admin\Kategori_staff@tambah');
Route::post('admin/kategori_staff/edit', 'App\Http\Controllers\Admin\Kategori_staff@edit');
Route::get('admin/kategori_staff/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_staff@delete');
// kategori_galeri
Route::get('admin/kategori_galeri', 'App\Http\Controllers\Admin\Kategori_galeri@index');
Route::post('admin/kategori_galeri/proses_tambah', 'App\Http\Controllers\Admin\Kategori_galeri@proses_tambah');
Route::post('admin/kategori_galeri/proses_edit', 'App\Http\Controllers\Admin\Kategori_galeri@proses_edit');
Route::get('admin/kategori_galeri/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_galeri@delete');
// staff
Route::get('admin/staff', 'App\Http\Controllers\Admin\Staff@index');
Route::get('admin/staff/cari', 'App\Http\Controllers\Admin\Staff@cari');
Route::get('admin/staff/status_staff/{par1}', 'App\Http\Controllers\Admin\Staff@status_staff');
Route::get('admin/staff/kategori/{par1}', 'App\Http\Controllers\Admin\Staff@kategori');
Route::get('admin/staff/delete/{par1}', 'App\Http\Controllers\Admin\Staff@delete');
Route::post('admin/staff/tambah_proses', 'App\Http\Controllers\Admin\Staff@tambah_proses');
Route::post('admin/staff/edit_proses', 'App\Http\Controllers\Admin\Staff@edit_proses');
Route::post('admin/staff/proses', 'App\Http\Controllers\Admin\Staff@proses');
// testimonial
Route::get('admin/testimonial', 'App\Http\Controllers\Admin\Testimonial@index');
Route::get('admin/testimonial/edit/{par1}', 'App\Http\Controllers\Admin\Testimonial@edit');
Route::post('admin/testimonial/tambah', 'App\Http\Controllers\Admin\Testimonial@tambah');
Route::post('admin/testimonial/proses_edit', 'App\Http\Controllers\Admin\Testimonial@proses_edit');
Route::get('admin/testimonial/delete/{par1}', 'App\Http\Controllers\Admin\Testimonial@delete');
Route::post('admin/testimonial/proses', 'App\Http\Controllers\Admin\Testimonial@proses');
// faq
Route::get('admin/faq', 'App\Http\Controllers\Admin\Faq@index');
Route::post('admin/faq/proses_tambah', 'App\Http\Controllers\Admin\Faq@proses_tambah');
Route::post('admin/faq/proses_edit', 'App\Http\Controllers\Admin\Faq@proses_edit');
Route::get('admin/faq/delete/{par1}', 'App\Http\Controllers\Admin\Faq@delete');
Route::post('admin/faq/proses', 'App\Http\Controllers\Admin\Faq@proses');
// galeri
Route::get('admin/galeri', 'App\Http\Controllers\Admin\Galeri@index');
Route::get('admin/galeri/cari', 'App\Http\Controllers\Admin\Galeri@cari');
Route::get('admin/galeri/status_galeri/{par1}', 'App\Http\Controllers\Admin\Galeri@status_galeri');
Route::get('admin/galeri/kategori/{par1}', 'App\Http\Controllers\Admin\Galeri@kategori');
Route::get('admin/galeri/delete/{par1}', 'App\Http\Controllers\Admin\Galeri@delete');
Route::post('admin/galeri/tambah_proses', 'App\Http\Controllers\Admin\Galeri@tambah_proses');
Route::post('admin/galeri/edit_proses', 'App\Http\Controllers\Admin\Galeri@edit_proses');
Route::post('admin/galeri/proses', 'App\Http\Controllers\Admin\Galeri@proses');
// log
Route::get('admin/log_aktivitas', 'App\Http\Controllers\Admin\Log@log_aktivitas');
Route::get('admin/log_users', 'App\Http\Controllers\Admin\Log@log_users');

// font
Route::get('admin/font', 'App\Http\Controllers\Admin\Font@index');
Route::post('admin/font/proses_tambah', 'App\Http\Controllers\Admin\Font@proses_tambah');
Route::post('admin/font/proses_edit', 'App\Http\Controllers\Admin\Font@proses_edit');
Route::get('admin/font/delete/{par1}', 'App\Http\Controllers\Admin\Font@delete');
/* END BACK END*/
