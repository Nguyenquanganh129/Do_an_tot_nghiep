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
Route::get('/', 'PagesController@index')->name('page.index');
Route::get('/lienhe', 'PagesController@getLienhe')->name('get.page.lienhe');
Route::post('/lienhe', 'PagesController@postLienhe')->name('post.page.lienhe');
Route::get('/solieu', 'PagesController@getSolieu')->name('get.page.solieu');
Route::get('/update/{id}', 'PagesController@getupdateSolieu')->name('update.page.solieu');
Route::post('/update/{id}', 'PagesController@updateSolieu')->name('post.page.solieu');

// Trang tin tức
Route::get('/pagetintuc/{id}','PagesTintucController@index')->name('index.pagetintuc');
Route::get('/pagetintuc/search/{id}','PagesTintucController@search')->name('search.pagetintuc');
// ------------------------------------------------------------------------------------------
// Trang chi tiết
Route::get('/pagechitiet/{id}','PagesChitietController@index')->name('index.pagechitiet');
Route::get('/pagechitiet2/{id}','PagesChitietController@chitiet2')->name('chitiet2.pagechitiet');
Route::get('/pagechitiet/search/{id}','PagesChitietController@search')->name('search.pagechitiet');
//////////////////////////////////////
Route::get('/search','HomeController@search' )->name('search.index');
Route::get('/sign-in','HomeController@getSign_in')->name('get.sign_in');
Route::post('/sign-in','HomeController@postSign_in')->name('post.sign_in');
Route::get('/logout', 'HomeController@getLogout')->name('user.logout');
Route::get('/forgotpassword','HomeController@getForgotpassword')->name('get.forgotpassword');
Route::post('/sendmail','HomeController@sendMail')->name('post.sendmail');
Route::get('/changepassword/{token}/{id}', 'HomeController@getviewChangepassword')->name('get.changepassword');
Route::post('/changepassword/{token}/{id}', 'HomeController@Changepassword')->name('post.changepassword');
Route::group(['prefix' => '','middleware' => ['checklogin']], function() {
    Route::get('/changeavatar','HomeController@getviewChangeavatar')->name('get.changeavatar');
    Route::post('/changeavatar','HomeController@Changeavatar')->name('post.changeavatar');
    Route::get('/getchangepassword','HomeController@viewChangepass_user')->name('get.viewChangepass_user');
    Route::post('/getchangepassword','HomeController@Changepass_user')->name('post.changepassword_user');
});
Route::group(['prefix' => 'admin','middleware' => ['checklogin','checkadmin']], function() {
	Route::get('/','AdminController@index')->name('admin.index');
	//TheLoai
	Route::get('/adminlienhe','AdminController@lienhe')->name('get.admin.lienhe');
	Route::group(['prefix' => 'theloai'], function() {
		Route::get('/','TheloaiController@index')->name('theloai.index');
		Route::post('/store','TheloaiController@store')->name('post.theloai.store');
		Route::post('/checkstore','TheloaiController@checkstore')->name('post.theloai.checkstore');
		Route::get('/update/{id}','TheloaiController@getUpdate')->name('get.theloai.update');
		Route::post('/update/{id}','TheloaiController@update')->name('post.theloai.update');
		Route::get('/delete/{id}', 'TheloaiController@destroy')->name('get.theloai.delete');
	});
	//LoaiTin
	Route::group(['prefix' => 'loaitin'], function() {
		Route::get('/','LoaitinController@index')->name('loaitin.index');
		Route::post('/store','LoaitinController@store')->name('post.loaitin.store');
		Route::get('/update/{id}','LoaitinController@getUpdate')->name('get.loaitin.update');
		Route::post('/update/{id}','LoaitinController@update')->name('post.loaitin.update');
		Route::get('/delete/{id}', 'LoaitinController@destroy')->name('get.loaitin.delete');
	});
	//TinTuc
	Route::group(['prefix' => 'tintuc'], function() {
		Route::group(['prefix' => 'public'], function() {
			Route::get('/getviewhotnews','TintucController@gethotnews')->name('tintuc.getview.hotnews');
			Route::get('/store','TintucController@postnew')->name('tintuc.get.postnew');
			Route::get('/','TintucController@indexpublic')->name('tintuc.index.public');
			Route::get('/getviewhighlight','TintucController@gethighlightnews')->name('tintuc.getview.highlightnews');
			Route::post('/store','TintucController@storepublic')->name('post.tintuc.store');
			Route::get('/update/{id}','TintucController@getUpdate')->name('get.tintuc.update');
			Route::post('/update/{id}','TintucController@update')->name('post.tintuc.update');
			Route::get('/deletepublic/{id}','TintucController@destroypublic')->name('post.tintuc.destroypublic');
			Route::get('/highlight/{id}','TintucController@highlight')->name('get.tintuc.highlight');
			Route::get('/unhighlight/{id}','TintucController@unhighlight')->name('get.tintuc.unhighlight');
			Route::get('/hotnews/{id}','TintucController@hotnews')->name('get.tintuc.hotnews');
			Route::get('/unhotnews/{id}','TintucController@unhotnews')->name('get.tintuc.unhotnews');
			Route::get('/view/{id}','TintucController@viewtintuc')->name('get.tintuc.view');
		});
		Route::group(['prefix' => 'private'], function() {
			Route::get('/','TintucController@indexprivate')->name('tintuc.index.private');
			Route::get('/accept/{id}','TintucController@accept')->name('tintuc.accept.private');
			Route::get('/destroyprivate/{id}','TintucController@destroyprivate')->name('post.tintuc.destroyprivate');
		});
	});
	//User
	Route::group(['prefix' => 'user'], function() {
		Route::get('/','UserController@index')->name('user.index');
		Route::post('/store','UserController@store')->name('post.user.store');
		Route::get('/delete/{id}','UserController@destroy')->name('get.user.delete');
	});
	//Slide
	Route::group(['prefix' => 'slide'], function() {
	    Route::get('/','SlideController@index')->name('slide.index');
	    Route::get('/store','SlideController@getStore')->name('slide.getstore');
	    Route::post('/store','SlideController@store')->name('slide.store');
	    Route::get('/delete/{id}','SlideController@destroy')->name('slide.destroy');
	});
});
Route::group(['prefix' => 'ctv','middleware' => ['checklogin','checkctv']], function() {
    Route::get('/','CongTacVienController@index')->name('ctv.index');
    Route::post('/ctvpost','CongTacVienController@store')->name('ctv.store');
    Route::get('/view/{id}','CongTacVienController@show')->name('ctv.view');
    Route::get('/edit/{id}', 'CongTacVienController@getupdate')->name('ctv.get.update');
    Route::post('/edit/{id}','CongTacVienController@update')->name('ctv.post.update');
    Route::get('/delete/{id}','CongTacVienController@destroy')->name('ctv.get.delete');
});