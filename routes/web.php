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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Store comment routes
Route::post('/comment/create', 'CommentController@store')->name('comment.store');

//delete comment Routes
Route::get('/comment/{id}', 'CommentController@destroy')->name('comment.delete');

//replies comment routes
Route::post('/comment/reply/{id}', 'CommentController@replies')->name('comment.replies');