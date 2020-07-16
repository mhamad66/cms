<?php

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
Route::get('/','welcomeController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/categories', 'categoryController');
Route::resource('/tags', 'tagsController');
Route::resource('/posts','postController');
Route::get('/trased-posts','postController@trashed')->name('index.trashed');
Route::get('/trased-posts/{id}','postController@restore')->name('index.restore');

});

Route::group(['middleware' => ['auth','CheckUser']], function () {
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
    Route::get('users','userController@index')->name('users.index');
    Route::post('users/{user}/makeAdmin','userController@makeAdmin')->name('makeAdmin');

});
Route::middleware(['auth'])->group( function () {
Route::get('/users/{user}/edit','userController@edit')->name('users.edit');
Route::post('/users/{user}/update','userController@update')->name('users.update'); 
}); 