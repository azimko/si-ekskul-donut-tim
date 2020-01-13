<?php

//Admin
Route::group(['prefix' => 'tutor','as'=>'admin-'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::group(['prefix' => 'users','as'=>'users-'], function () {
        Route::get('/', 'Admin\UsersController@index')->name('home');
        //Admin
        Route::get('/admin', 'Admin\UsersController@index_admin')->name('admin');
        Route::get('/get-data-admin', 'Admin\UsersController@data_admin')->name('admin-data');
        Route::post('/admin/store', 'Admin\UsersController@store_admin')->name('admin-store');
        Route::get('/admin/{id}/{name}/edit', 'Admin\UsersController@edit_admin');
        Route::post('/admin/{id}/{name}/update', 'Admin\UsersController@update_admin');
        Route::get('/admin/{id}/{name}/hapus', 'Admin\UsersController@destroy_admin');
        //Operator
        Route::get('/operator', 'Admin\UsersController@index_operator')->name('operator');
        Route::get('/get-data-operator', 'Admin\UsersController@data_operator')->name('operator-data');
        Route::post('/operator/store', 'Admin\UsersController@store_operator')->name('operator-store');
        Route::get('/operator/{id}/{name}/edit', 'Admin\UsersController@edit_operator');
        Route::post('/operator/{id}/{name}/update', 'Admin\UsersController@update_operator');
        Route::get('/operator/{id}/{name}/hapus', 'Admin\UsersController@destroy_operator');
        //Siswa
        Route::get('/siswa', 'Admin\UsersController@index_siswa')->name('siswa');
        Route::get('/get-data-siswa', 'Admin\UsersController@data_siswa')->name('siswa-data');
        Route::post('/siswa/store', 'Admin\UsersController@store_siswa')->name('siswa-store');
        Route::get('/siswa/{id}/{nama_lengkap}/edit', 'Admin\UsersController@edit_siswa');
        Route::post('/siswa/{id}/{nama_lengkap}/update', 'Admin\UsersController@update_siswa');
        Route::get('/siswa/{id}/{nama_lengkap}/hapus', 'Admin\UsersController@destroy_siswa');
    });
    Route::group(['prefix' => 'absensi','as'=>'absensi-'], function () {
        Route::get('/', 'Admin\AbsensiController@index')->name('home');
        Route::post('/store', 'Admin\AbsensiController@store')->name('store');
        Route::get('/{id}/{materi_pembelajaran}/hapus', 'Admin\AbsensiController@destroy');
        Route::get('/detail/{id}/{materi_pembelajaran}/detail', 'Admin\AbsensiController@detail');
        Route::get('/detail/get-data-detail/{id}/{materi_pembelajaran}/detail', 'Admin\AbsensiController@data_detail')->name('detail');
    });
    Route::group(['prefix' => 'soal', 'as' => 'soal-'], function(){
        Route::get('/', 'Admin\SoalController@index')->name('home');
        Route::post('/store', 'Admin\SoalController@store')->name('store');
        Route::get('/get-data', 'Admin\SoalController@data')->name('data');
        Route::get('/{id}/{judul_soal}/edit', 'Admin\SoalController@edit');
        Route::post('/{id}/{judul_soal}/update', 'Admin\SoalController@update');
        Route::get('/{id}/{judul_soal}/hapus', 'Admin\SoalController@destroy');
        Route::get('/{id}/{judul_soal}/data', 'Admin\SoalController@data_soal');
        Route::post('/{id}/{judul_soal}/data/store', 'Admin\SoalController@data_store')->name('data-store');
        Route::get('/{id}/{judul_soal}/data/{id_datasoal}/{soal}/hapus', 'Admin\SoalController@data_hapus');
    });
    Route::group(['prefix' => 'nilai', 'as' => 'nilai-'], function(){
        Route::get('/', 'Admin\NilaiController@index')->name('home');
    });
});
Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/events', 'HomeController@events')->name('events');
});
Auth::routes();

Route::get('/', function(){
    return redirect()->route('home');
});
