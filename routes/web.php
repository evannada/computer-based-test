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

Auth::routes();

Route::group(['middleware' => 'admin'], function(){
  Route::Resource('data-guru', 'Users\TeacherController');
  Route::get('api/data-guru', 'Users\TeacherController@apiDataGuru')->name('api.data-guru');
  Route::Resource('data-siswa', 'Users\StudentController');
  Route::get('api/data-siswa', 'Users\StudentController@apiDataSiswa')->name('api.data-siswa');
  Route::Resource('data-mapel', 'Users\SubjectController');
  Route::get('api/data-mapel', 'Users\SubjectController@apiDataMapel')->name('api.data-mapel');
  // Route::get('/admin', 'AdminController@index');
});

Route::get('/home', 'HomeController@index');
