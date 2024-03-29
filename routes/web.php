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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/about', function () {
//     $nama = 'Hadi Prasetyo';
//     return view('about', ['nama' => $nama]);
// });


Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');

Route::get('/mahasiswa', 'MahasiswaController@index');

// Students
// Route::get('/students', 'StudentsController@index');
// Route::get('/students/create', 'StudentsController@create');
// Route::get('/students/{student}', 'StudentsController@show');
// Route::post('/students', 'StudentsController@store');
// Route::delete('/students/{student}', 'StudentsController@destroy');
// Route::get('/students/{student}/edit', 'StudentsController@edit');
// Route::patch('/students/{student}', 'StudentsController@update');  // bisa menggunakan Route::put sama aja jika di edit.blade.php menggunakan method 'put'


// semua route Students dia atas bisa di ganti dengan satu baris ini :v
Route::resource('students', 'StudentsController');


