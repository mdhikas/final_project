<?php

use App\Http\Controllers\UsersController;
use Illuminate\Routing\RouteGroup;
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

// Route::get('/', 'AdminsController@index');

//Dashboard
Route::group(['middleware' => ['auth', 'checkStatus:Admin']], function () {

    //SideBar
    Route::get('/dashboard', 'UsersController@index');
    Route::get('/dashboard/form', 'UsersController@form');
    Route::post('/dashboard/form', 'EmployeesController@store');
    Route::get('/dashboard/karyawan', 'UsersController@karyawan');

    //Sertifikasi
    Route::get('/dashboard/sertifikasi', 'UsersController@sertifikasi');
    Route::get('/dashboard/sertifikasi/skkni', 'UsersController@skkni');
    Route::get('/dashboard/sertifikasi/enviro', 'UsersController@enviro');
    Route::get('/dashboard/sertifikasi/ohs', 'UsersController@ohs');
    Route::get('/dashboard/nonsertifikasi', 'UsersController@nonsertifikasi');
    Route::get('/dashboard/nonsertifikasi/nonmandatory', 'UsersController@nonmandatory');

    //Certification Test
    Route::get('/dashboard/test/index', 'UsersController@test');
    Route::get('/dashboard/test/kriteria', 'KriteriasController@index');
    Route::get('/dashboard/test/alternatif', 'AlternatifsController@index');
    Route::get('/dashboard/test/nilai_alternatif', 'NilaiAlternatifsController@index');
    Route::get('/dashboard/test/perhitungan', 'UsersController@perhitungan');

    //Kriteria
    // Route::post('/dashboard/test/kriteria', 'KriteriasController@store');
    // Route::put('/dashboard/test/kriteria/{kriteria}', 'KriteriasController@update');
    // Route::get('/dashboard/test/kriteria/{kriteria}', 'KriteriasController@show');
    // Route::delete('/dashboard/test/kriteria/{kriteria}', 'KriteriasController@destroy');
    Route::resource('/dashboard/test/kriteria', 'KriteriasController');

    //Alternatif
    // Route::post('/dashboard/test/alternatif', 'AlternatifsController@store');
    // Route::delete('/dashboard/test/alternatif', 'AlternatifsController@destroy');
    Route::resource('/dashboard/test/alternatif', 'AlternatifsController');
    Route::post('/alternatif/store_criteria', 'AlternatifsController@store_criteria');
    Route::get('/alternatif/get_criteria', 'AlternatifsController@get_criteria');
    Route::post('/alternatif/update_criteria', 'AlternatifsController@update_criteria');

    // NilaiAlternatif
    // Route::post('/dashboard/test/nilai_alternatif/{nilai_alternatif}', 'NilaiAlternatifsController@edit');
    // Route::delete('/dashboard/test/nilai_alternatif/{nilai_alternatif}', 'NilaiAlternatifsController@destroy');
    Route::resource('/dashboard/test/nilai_alternatif', 'NilaiAlternatifsController');
    
    //PDFReporting
    Route::get('/sertifikasi/enviro/pdfreport', 'ReportsController@enviro');
    Route::get('/dashboard/cetak-pdf', 'UsersController@cetak_pdf');

    Route::get('/auth/change-password', 'AuthsController@change_password');
    Route::post('/auth/store-password', 'AuthsController@store_password');
});

Route::group(['middleware' => ['auth', 'checkStatus:Admin,Karyawan']], function () {
    Route::get('/dashboard', 'UsersController@index');
    Route::get('/profil', 'UsersController@profil');
});

Route::get('/', 'AuthsController@signin');
Route::get('/signin', 'AuthsController@signin')->name('signin');
Route::post('/signin', 'AuthsController@postSignin');
Route::get('/signout', 'AuthsController@signout');
Route::get('/signup', 'AuthsController@signup');
Route::post('/signup', 'UsersController@update');
Route::get('/promethee', 'AlternatifsController@promethee');
// Route::post('/postSignin', 'DashboardsController@postSignin');
// Route::get('/sertifikasi', 'AdminsController@sertifikasi');
// Route::get('/form', 'AdminsController@form');
