<?php

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/group/create",'App\Http\Controllers\Home\GroupController@createView')->name('create.group');
Route::get("/group/show/{id}",'App\Http\Controllers\Home\GroupController@showAll')->name('group.show');
Route::get("/group/show/{id}/{idd}",'App\Http\Controllers\Home\GroupController@showOne')->name('group.show.one');
Route::post('/group/create','App\Http\Controllers\Home\GroupController@create')->name('group.create');



Route::get('/logout',function(){
    Auth::logout();
    return view('auth/login');
})->name('logout');
