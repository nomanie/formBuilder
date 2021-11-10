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
//groups
Route::get("/group/create",'App\Http\Controllers\Home\GroupController@createView')->name('create.group');
Route::get("/group/show",'App\Http\Controllers\Home\GroupController@showAll')->name('group.show');
Route::get("/group/show/{idd}",'App\Http\Controllers\Home\GroupController@showOne')->name('group.show.one');
Route::post('/group/create','App\Http\Controllers\Home\GroupController@create')->name('group.create');
Route::post('group/delete/{group_id}/{id}','App\Http\Controllers\Home\GroupController@deleteUser')->name('delete.user');
Route::delete('group/delete/{group_id}/{id}','App\Http\Controllers\Home\GroupController@deleteGroup')->name('group.delete');
Route::post('/group/{group_id}/edit','App\Http\Controllers\Home\GroupController@changeName')->name('change.name.group');
Route::post('/group/{group_id}/edit/role/{user_id}','App\Http\Controllers\Home\GroupController@changeUserRole')->name('change.user.role');
Route::delete('group/{id}/{group_id}/leave','App\Http\Controllers\Home\GroupController@leaveGroup')->name('group.leave');
Route::post('/group/{group_id}/changeOwner','App\Http\Controllers\Home\GroupController@changeOwner')->name('change.group.owner');
//invites
Route::post('/{id}/invite/send','App\Http\Controllers\Home\InvitationController@store')->name('send.invite');
Route::get('/invite/show/{id}','App\Http\Controllers\Home\InvitationController@show')->name('show.invite');
Route::post('/invite/join/{id}/{gid}','App\Http\Controllers\Home\InvitationController@join')->name('join.invite');
Route::post('/invite/refuse/{id}/{gid}','App\Http\Controllers\Home\InvitationController@refuse')->name('refuse.invite');
Route::get('/invite/show/send/{id}','App\Http\Controllers\Home\InvitationController@showSended')->name('show.sended.invite');
Route::post('/invite/show/send/{id}/{gid}/delete','App\Http\Controllers\Home\InvitationController@cancel')->name('cancel.invite');
//forms
Route::get('/forms/{id}',function(){
    return view('home/pages/forms/show');
})->name('show.forms');
Route::get('/forms/one/{id}',function(){
    return view('home/pages/forms/showOne');
})->name('show.one.form');
//logout
Route::get('/logout',function(){
    Auth::logout();
    return view('auth/login');
})->name('logout');
