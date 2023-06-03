<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DncController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SanitizeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','landing');

// Route::view('app/login','login');

Route::group(['middleware'=>'user-access:admin'],function(){

    Route::get('admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    
    Route::get('/csv', [CsvController::class, 'index'])->name('admin.csv');
    Route::get('add/csv', [CsvController::class, 'create'])->name('admin.add.csv');
    Route::post('add/csv', [CsvController::class, 'store'])->name('admin.store.csv');
    Route::delete('delete/csv/{csv}', [CsvController::class, 'destroy'])->name('admin.delete.csv');
    
    Route::get('/dnc', [DncController::class, 'index'])->name('admin.dnc');
    Route::get('add/dnc', [DncController::class, 'create'])->name('admin.add.dnc');
    Route::post('add/dnc', [DncController::class, 'store'])->name('admin.store.dnc');
    Route::delete('delete/dnc/{dnc}', [DncController::class, 'destroy'])->name('admin.delete.dnc');
    
    Route::get('/lead', [LeadController::class, 'index'])->name('admin.lead');
    Route::get('add/lead', [LeadController::class, 'create'])->name('admin.add.lead');
    Route::post('add/lead', [LeadController::class, 'store'])->name('admin.store.lead');
    Route::delete('delete/lead/{lead}', [LeadController::class, 'destroy'])->name('admin.delete.lead');
    
    
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('add/user', [UserController::class, 'create'])->name('admin.add.user');
    Route::post('add/user', [UserController::class, 'store'])->name('admin.store.user');
    Route::get('edit/user/{id}', [UserController::class, 'edit'])->name('admin.edit.user');
    Route::put('edit/user/{id}', [UserController::class, 'update'])->name('admin.update.user');
    Route::delete('delete/user/{id}', [UserController::class, 'destroy'])->name('admin.delete.user');
    
    Route::get('/sanitize', [SanitizeController::class, 'index'])->name('admin.sanitize');
    
    Route::get('add/sanitize', [SanitizeController::class, 'create'])->name('admin.add.sanitize');
    Route::post('add/sanitize', [SanitizeController::class, 'store'])->name('admin.store.sanitize');
    Route::delete('delete/sanitize/{sanitize}', [SanitizeController::class, 'destroy'])->name('admin.delete.sanitize');
    
    Route::get('/sanitized', [SanitizeController::class, 'sanitizedIndex'])->name('sanitized');
    Route::delete('delete/sanitized/{id}', [SanitizeController::class, 'deleteSanitized'])->name('delete.sanitized');
});

Route::group(['middleware'=>'auth'],function(){
Route::get('user/add/sanitize', [SanitizeController::class, 'addSanitize'])->name('user.add.sanitize');
Route::post('user/add/sanitize', [SanitizeController::class, 'store'])->name('user.store.sanitize');

Route::get('user/sanitized', [SanitizeController::class, 'userSanitizedIndex'])->name('user.sanitized');
Route::delete('user/delete/sanitized/{id}', [SanitizeController::class, 'deleteSanitized'])->name('user.delete.sanitized');
});
// Route::get('user/sanitize', [SanitizeController::class, 'userIndex'])->name('user.sanitize');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
