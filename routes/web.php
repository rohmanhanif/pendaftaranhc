<?php

namespace App\Http\Controllers\Auth;


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


});
Auth::routes();



// require__DIR__.'/auth.php';

    


Route::get('/home', function ()
{
    return view('layouts.admin');
});
// Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::resource('/group', 'App\Http\Controllers\GroupController');
Route::resource('/member', 'App\Http\Controllers\MemberController');
Route::resource('/schedule', 'App\Http\Controllers\ScheduleController');