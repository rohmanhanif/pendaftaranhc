<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\groupcontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;

Route::get('/',  function ()
{
    return view('layouts.admin');
});

//route resource

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth'])->group(function () {

Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/students', \App\Http\Controllers\StudentController::class);
Route::resource('/groups', \App\Http\Controllers\groupcontroller::class);
Route::resource('/members', \App\Http\Controllers\membercontroller::class);

});
Auth::routes();



// require__DIR__.'/auth.php';

    


Route::get('/home', [HomeController::class, 'index'])->name('home');

