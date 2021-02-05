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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blank-hotelin', function () {
    return view('projek_akhir.blank');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit/profile', function () {
    return view('projek_akhir.crud_profile.edit-profile');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::resource('hotel', 'HotelController');
//Route::post('/register', 'LoginController@post');
Route::get('/keluar', 'LoginController@logout');
