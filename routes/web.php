<?php

use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');
    Route::get('/admin/new-advice', 'App\Http\Controllers\admin\DashboardController@advice')->name('admin-new-advice');
    Route::post('/admin/add-advice', 'App\Http\Controllers\admin\DashboardController@add')->name('admin-add-advice');

    Route::get('/admin/crimes', 'App\Http\Controllers\admin\CrimeController@index')->name('admin-crimes');
    Route::get('/admin/new-crime', 'App\Http\Controllers\admin\CrimeController@crime')->name('admin-new-crime');
    Route::post('/admin/add-crime', 'App\Http\Controllers\admin\CrimeController@add')->name('admin-add-crime');

    Route::get('/admin/places', 'App\Http\Controllers\admin\PlaceController@index')->name('admin-places');
    Route::get('/admin/new-place', 'App\Http\Controllers\admin\PlaceController@place')->name('admin-new-place');
    Route::post('/admin/add-place', 'App\Http\Controllers\admin\PlaceController@add')->name('admin-add-place');

    Route::get('/admin/criminals', 'App\Http\Controllers\admin\CriminalController@index')->name('admin-criminals');
    Route::get('/admin/new-criminal', 'App\Http\Controllers\admin\CriminalController@criminal')->name('admin-new-criminal');
    Route::post('/admin/add-criminal', 'App\Http\Controllers\admin\CriminalController@add')->name('admin-add-criminal');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/user/dashboard', 'App\Http\Controllers\user\DashboardController@index')->name('user-dashboard');

    Route::get('/user/who', 'App\Http\Controllers\user\WhoController@index')->name('user-who');
    Route::get('/user/where', 'App\Http\Controllers\user\WhereController@index')->name('user-where');
    Route::get('/user/what', 'App\Http\Controllers\user\WhatController@index')->name('user-what');

    Route::get('/user/experiences', 'App\Http\Controllers\user\ExperienceController@index')->name('user-experiences');
    Route::get('/user/new-experience', 'App\Http\Controllers\user\ExperienceController@experience')->name('user-new-experience');
    Route::get('/user/add-experience', 'App\Http\Controllers\user\ExperienceController@add')->name('user-add-experience');
});

require __DIR__.'/auth.php';
