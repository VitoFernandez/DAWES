<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\sesionController;

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

Route::get('home', function () {
    return view('home.index');
});

Route::get('frontend/create', function () {
    return view('frontend.create');
});


Route::Delete('/pregunta/{pregunta}', [BackendController::class, 'destroy']);
Route::get('backend/view', [BackendController::class, 'viewContent']);
Route::get('/', [sesionController::class, 'singin'])->name('/');
Route::post('/login', [sesionController::class, 'login'])->name('login');
Route::resource('singin', LogController::class);
Route::resource('backend', BackendController::class);
Route::resource('frontend', FrontendController::class);
