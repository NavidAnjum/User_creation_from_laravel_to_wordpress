<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/form', function () {
    return view('form');
});

Route::get('wordpress_users',[CustomersController::class,'wordpress_users'])->name('wordpress_users');

Route::post('/form', [CustomersController::class,'store'])->name('form');

Route::get('/single_customer/{id}', [CustomersController::class,'index']);

Route::get('/dashboard',[CustomersController::class,'show'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
