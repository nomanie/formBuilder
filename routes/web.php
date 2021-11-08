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
Route::post('/invite/send','App\Http\Controllers\Home\InvitationController@store')->name('send.invite');
Route::get('/invite/show/{id}','App\Http\Controllers\Home\InvitationController@show')->name('show.invite');
Route::post('/invite/join/{id}/{gid}','App\Http\Controllers\Home\InvitationController@join')->name('join.invite');
Route::post('group/show/delete/{group_id}/{id}','App\Http\Controllers\Home\GroupController@deleteUser')->name('delete.user');
Route::delete('group/{id}/{group_id}/delete','App\Http\Controllers\Home\GroupController@deleteGroup')->name('group.delete');
Route::post('/group/{group_id}/edit','App\Http\Controllers\Home\GroupController@changeName')->name('change.name.group');
Route::post('/group/{group_id}/editname','App\Http\Controllers\Home\GroupController@changeUserRole')->name('change.user.role');

Route::get('/logout',function(){
    Auth::logout();
    return view('auth/login');
})->name('logout');
