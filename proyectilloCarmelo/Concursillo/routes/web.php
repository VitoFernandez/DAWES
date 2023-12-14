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



/* sesionController */
Route::get('/', [sesionController::class, 'singin'])->name('/');
Route::post('/login', [sesionController::class, 'login'])->name('login');

/* LogController */
Route::resource('singin', LogController::class);

/* BackendController */
Route::Delete('/backend/{pregunta}', [BackendController::class, 'destroy']);
Route::resource('backend', BackendController::class);
Route::get('view', [BackendController::class, 'viewContent']);
Route::get('home', [BackendController::class, 'home']);


/* FrontendController */
Route::resource('frontend', FrontendController::class);
Route::get('frontent/create', [FrontendController::class, 'create']);

