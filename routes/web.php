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


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::resource('hotel', 'HotelController');
//Route::post('/register', 'LoginController@post');
Route::get('/keluar', 'LoginController@logout');
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/{profile_id}', 'ProfileController@show');
Route::get('/profile/{profile_id}/edit', 'ProfileController@edit');
Route::get('/create/profile', 'ProfileController@create' );
Route::post('/profile', 'ProfileController@store');
Route::put('/profile/{profile_id}', 'ProfileController@update');
Route::delete('/profile/{profile_id}', 'ProfileController@destroy');
