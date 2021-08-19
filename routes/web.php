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

Route::get('/', 'PagesController@welcome');
Route::get('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::post('/postlogin', 'AuthController@login');

Auth::routes();

Route::group(['middleware' => ['auth','checkRole:pelapor']],function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('dashboard' , 'DashboardController@loadDataAjax');
    Route::post('submit' , 'DashboardController@save');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/lapor' , 'LaporController@index')->name('lapor');
    Route::get('/laporan-saya' , 'LaporanUserController@index')->name('laporan-saya');
    Route::post('/laporan-saya' , 'LaporanUserController@loadDataAjax');

});

Route::group(['middleware' => ['auth','checkRole:admin']],function(){
    Route::get('/admin' , 'AdminController@index');
    Route::get('/kelola-laporan' , 'AdminController@kelola');
    Route::patch('/kelola-laporan/{laporan}' , 'AdminController@update');
    Route::get('/daftar-laporan' , 'AdminController@daftarlaporan');
    Route::get('/notif' , 'AdminController@notif');
});
