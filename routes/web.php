<?php

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

use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('welcome');
});

//halaman login
Route::get('/log-in','LoginController@index')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');


//login sistem
Route::post('/poslogin','LoginController@poslogin');
Route::get('/home-user', 'LoginController@homeindex')->name('home.user');


//akun
Route::get('/profile', 'ProfileController@index')->name('profile');
// Route::get('/edit-profile', 'ProfileController@viewedit')->name('profile.edit');
Route::post('/profile/{id}/postupdate', 'ProfileController@postupdate');
Route::get('/edit-password', 'ProfileController@editpassword')->name('edit.password');
Route::post('/profile/{id}/updatepassword', 'ProfileController@updatepassword');


//home
Route::get('/home', 'HomeController@index')->name('home');

//ROUTE ADMIN
Route::group(['middleware' => ['auth','CheckRole:admin,visitor']], function () {
    //dashboard
Route::get('/dashboard', 'DashboardController@index');

//kelola dokumen
Route::get('/dokumen', 'DokumenController@index')->name('dokumen');
Route::get('/dokumen/tambah', 'DokumenController@showform')->name('dokumen.tambah');
Route::post('/dokumen/simpan', 'DokumenController@simpan')->name('dokumen.simpan');
Route::get('/dokumen/edit/{id}', 'DokumenController@showedit');
Route::post('/dokumen/update/{id}', 'DokumenController@update');
Route::get('/dokumen/lihat/{id}', 'DokumenController@showfile');
Route::get('/dokumen/{id}/delete', 'DokumenController@delete');

//kelola isu
Route::get('/isu', 'IsuController@tampilisu')->name('data.isu');
Route::get('/isu/tambah', 'IsuController@isutambah')->name('isutambah');
Route::post('/isu/simpan', 'IsuController@simpanisu')->name('isu.simpan');
Route::get('/isu/{id}/editisu', 'IsuController@editisu');
Route::post('/isu/{id}/update', 'IsuController@updateisu');
Route::get('/isu/{id}/delete', 'IsuController@deleteisu');

//kelola user
Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/tambah', 'UserController@usertambah')->name('user.tambah');
Route::post('/user/simpan', 'UserController@simpan')->name('user.simpan');
Route::get('/user/{id}/edit', 'UserController@edit');
Route::post('/user/{id}/update', 'UserController@update');
Route::get('/user/{id}/delete', 'UserController@delete');
Route::get('/user/{id}/edit/password', 'UserController@editpassword');
Route::post('/user/{id}/simpan/password', 'UserController@simpanpassword');


//kelola diskusi
Route::get('/forum-diskusi', 'ForumdiskusiController@tampildata')->name('tampildata.forum');
Route::get('/tambah-forum', 'ForumdiskusiController@tambahforum')->name('tambah.forumdiskusi');
Route::post('/forumdiskusi/simpan', 'ForumdiskusiController@adminsimpan')->name('forumdiskusi.simpan');
Route::get('/forumdiskusi/{id}/edit', 'ForumdiskusiController@editforum');
Route::post('/forumdiskusi/{id}/update', 'ForumdiskusiController@adminupdate');
Route::get('/forumdiskusi/{id}/delete', 'ForumdiskusiController@admindelete');

//kelola komentar
Route::get('/komentar', 'KomentarController@tampildata')->name('tampildata.komentar');
Route::post('/komentar/{id}/update', 'KomentarController@adminupdate');
Route::get('/komentar/{id}/delete', 'KomentarController@admindelete');

//kelola wiki
Route::get('/Kelola-Wiki', 'WikiController@tampildata')->name('tampildata.wiki');
Route::get('/Wiki-tambah', 'WikiController@tambahdata')->name('tambahdata.wiki');
Route::post('/wiki/simpan', 'WikiController@simpan')->name('wiki.simpan');
Route::get('/wiki/{id}/delete', 'WikiController@delete');
Route::get('/wiki/{id}/haledit', 'WikiController@haledit');
Route::post('/wiki/{id}/updatewiki', 'WikiController@updatewiki');

//kelola faq

Route::get('/Kelola/Faq', 'FaqController@tampildata')->name('tampildata.faq');
Route::get('/faq/tambah', 'FaqController@faqtambah')->name('faq.tambah');
Route::post('/faq/simpan', 'FaqController@simpan')->name('faq.simpan');
Route::get('/faq/{id}/delete', 'FaqController@postdelete');
Route::get('/faq/{id}/edit', 'FaqController@faqedit');
Route::post('/faq/{id}/update', 'FaqController@update');


//kelola kategori
Route::get('/Kelola-Kategori', 'KategoriController@tampildata')->name('kategori');
Route::post('/kategori/simpan', 'KategoriController@simpan')->name('kategori.simpan');
Route::get('/kategori/{id}/delete', 'KategoriController@delete');
Route::post('/kategori/{id}/update', 'KategoriController@update');


//kelola kategori lain
Route::get('/Kelola-Kategorilain', 'KategoriController@showdata')->name('kategori.lainya');
Route::post('/kategorilain/simpan', 'KategoriController@postdata')->name('kategorilain.simpan');
Route::post('/kategorilain/{id}/update', 'KategoriController@postupdate');
Route::get('/kategorilain/{id}/delete', 'KategoriController@postdelete');


//kelola kluster
Route::get('/kelola-kluster', 'KategoriController@indexkluster')->name('kluster');
Route::post('/kluster-simpan', 'KategoriController@simpankluster')->name('kluster.simpan');
Route::get('/kluster/{id}/hapus', 'KategoriController@hapuskluster');
Route::post('/kluster/{id}/edit', 'KategoriController@editkluster');

});

//------------------------------------------------------------------------------------------------------//

//landingpage
Route::get('/register','LandingController@register');
Route::post('/simpan-data','LandingController@simpan')->name('simpan.data');
Route::get('/selamat-datang','LandingController@index');


Route::group(['middleware' => ['auth','CheckRole:visitor,admin']], function () {

//fitur forum diskusi
Route::get('/forum','ForumdiskusiController@forum')->name('list');
Route::get('/forumdiskusi/{forumdiskusi}/lihatdiskusi', 'ForumdiskusiController@index')->name('forumdiskusi');
Route::post('/forumdiskusi/{forumdiskusi}/lihatdiskusi', 'ForumdiskusiController@postkomentar');
Route::get('/tambah/forum','ForumdiskusiController@tambah')->name('tambah.forum');
Route::post('/tambah/simpan','ForumdiskusiController@simpan')->name('forum-simpan');
Route::get('/forum/saya','ForumdiskusiController@forumsaya')->name('forum.saya');
Route::get('/forum/saya/edit/{id}','ForumdiskusiController@forumsayaedit');
Route::post('/forum/saya/simpanedit/{id}','ForumdiskusiController@simpanedit');

//fitur FAQ
Route::get('/faq', 'FaqController@index')->name('faq');
Route::get('/faq/{jenis}', 'FaqController@showjenis')->name('faq.jenis');

//fitur dokumen pengetahuan
Route::get('/dokpeng', 'DokumenController@show')->name('dokpeng');
Route::get('/tambah/dokumen', 'DokumenController@tambahdokumen')->name('tambahdokumen');
Route::post('/simpan/dokumen', 'DokumenController@simpandokumen')->name('simpandokumen');
Route::get('/lihat/{id}/dokumen','DokumenController@lihatdokumen');
Route::get('/dokpeng/{kategori}', 'DokumenController@showkategori')->name('dokumen.kategori');
Route::get('/daftar/dokumen', 'DokumenController@doksaya')->name('doksaya');
Route::get('/dokumensaya/edit/{id}', 'DokumenController@doksayaedit');
Route::post('/dokumensaya/edit/simpan/{id}', 'DokumenController@doksimpanedit');

//fitur wiki
Route::get('/wiki', 'WikiController@index')->name('wiki');
Route::get('/daftar/wiki', 'WikiController@wikisaya')->name('wikisaya');
Route::get('/tambah/wiki', 'WikiController@tambahwiki')->name('tambahwiki');
Route::post('/post/wiki', 'WikiController@postwiki')->name('postwiki');
Route::get('/wiki/{id}/edit','WikiController@editwiki');
Route::post('/wiki/{id}/posteditwiki', 'WikiController@posteditwiki');
Route::get('/wiki/{newwiki}', 'WikiController@bacawiki')->name('wiki.baca');


//fitur isu
Route::get('/helpdesk', 'IsuController@showisu')->name('helpdesk');
Route::get('/isu/saya', 'IsuController@isusaya')->name('isu.saya');
Route::get('/isu/lapor', 'IsuController@isulapor')->name('isu.lapor');
Route::post('/helpdesk/lapor', 'IsuController@saveisu')->name('save.isu');
Route::get('/helpdesk/{jenis}', 'IsuController@showjenis')->name('helpdesk.jenis');
Route::get('/isu/saya/edit/{id}','IsuController@isusyedit');
Route::post('/isu/saya/update/{id}', 'IsuController@isusyupdate');
Route::get('/isu/lihat/{id}', 'IsuController@lihatisu');
});

Route::get('user/home', 'LandingController@homeuser')->name('user.home');