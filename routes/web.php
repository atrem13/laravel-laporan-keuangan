<?php

Route::get('/', 'HomeController@index')->name('home.index');

// auth
Route::get('/unauth', function(){
    return view('unauth');
})->name('unauth');
Route::get('/unauth/back', function(){
    return redirect()->back();
})->name('unauth.back');
Route::get('/auth/login', 'LoginSetupController@form_login')->name('form_login');
Route::post('/auth/login', 'LoginSetupController@filter_login')->name('filter_login');
Route::get('/auth/logout', 'LoginSetupController@logout')->name('logout');

Route::resource('admin', 'AdminController');
Route::get('/laporan_keuangan', 'LaporanKeuanganController@index')->name('laporan_keuangan.index');
Route::get('/summary_keuangan', 'SummaryKeuanganController@index')->name('summary_keuangan.index');

// Auth::routes();


