<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcesoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Doc_documentoController;
    
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
    return view('auth.login');
});
 

Auth::routes();
Route::get('/home', [App\Http\Controllers\Doc_documentoController::class, 'index'])->name('home')->middleware('auth');
// asi cambiamos todas las solicitudes para acceder a todas las url
Route::resource('proceso',ProcesoController::class)->middleware('auth');
Route::resource('doc_documentos',Doc_documentoController::class)->middleware('auth');


 
 