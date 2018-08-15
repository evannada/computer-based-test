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

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'admin'||'teacher'||'student'], function () {
    Route::get('password', 'PasswordController@change')->name('password.change');
    Route::put('password', 'PasswordController@update')->name('password.update');
});

Route::group(['middleware' => 'admin'], function(){
  Route::put('password/{id}', 'PasswordController@updateAdmin')->name('password.updateAdmin');
  Route::Resource('data-guru', 'TeacherController');
  Route::get('api/data-guru', 'TeacherController@apiDataGuru')->name('api.data-guru');
  Route::get('api/data-guru-indo', 'TeacherController@apiDataGuruIndo')->name('api.data-guru-indo');
  Route::get('api/data-guru-inggris', 'TeacherController@apiDataGuruInggris')->name('api.data-guru-inggris');
  Route::get('api/data-guru-mtk', 'TeacherController@apiDataGuruMtk')->name('api.data-guru-mtk');
  Route::get('api/data-guru-ipa', 'TeacherController@apiDataGuruIpa')->name('api.data-guru-ipa');
  Route::Resource('data-siswa', 'StudentController');
  Route::get('api/data-siswa', 'StudentController@apiDataSiswa')->name('api.data-siswa');
  Route::get('api/data-mapel', 'SubjectController@apiDataMapel')->name('api.data-mapel');
});

Route::group(['middleware' => 'admin'||'teacher'], function(){
  Route::Resource('soal','QuestionController');
  Route::get('api/soal', 'QuestionController@apiSoal')->name('api.soal');
  Route::Resource('hasil-ujian', 'ResultController');
  Route::get('hasil-ujian/{id}/pdf/IX-A', 'ResultController@pdf_a')->name('hasil-ujian.IX-A');
  Route::get('hasil-ujian/{id}/pdf/IX-B', 'ResultController@pdf_b')->name('hasil-ujian.IX-B');
  Route::get('hasil-ujian/{id}/pdf/IX-C', 'ResultController@pdf_c')->name('hasil-ujian.IX-C');
  Route::get('hasil-ujian/{id}/pdf/IX-D', 'ResultController@pdf_d')->name('hasil-ujian.IX-D');

});

Route::group(['middleware' => 'teacher'], function(){
  Route::Resource('ujian', 'MakeTestController');
  Route::get('api/ujian', 'MakeTestController@apiUjian')->name('api.ujian');
});

Route::group(['middleware' => 'student'], function(){
  Route::get('api/ujian-siswa', 'StudentTestController@apiUjianSiswa')->name('api.ujian-siswa');
  Route::get('ujian-siswa', 'StudentTestController@index')->name('ujian-siswa.index');
  Route::post('ujian-siswa/verif-token', 'StudentTestController@veriftoken')->name('ujian-siswa.verif');
  Route::get('ujian-siswa/{encode_id}', 'StudentTestController@show')->name('ujian-siswa.show');
  Route::post('ujian-siswa/{id}', 'StudentTestController@store')->name('ujian-siswa.store');
  Route::get('nilai-siswa/{id}', 'StudentTestController@result')->name('ujian-siswa.result');
  Route::get('hasil-ujian-siswa', 'StudentTestController@resultAll')->name('ujian-siswa.result-all');
  Route::get('hasil-ujian-siswa/pdf', 'StudentTestController@pdf')->name('ujian-siswa.pdf');
});
