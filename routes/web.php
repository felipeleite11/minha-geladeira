<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProductController,
    UserController,
    SessionController
};

Route::get('/', function() {
    return redirect('/session');
});

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);

Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);

Route::get('/session', [SessionController::class, 'index']);
Route::post('/session', [SessionController::class, 'store']);
Route::delete('/session', [SessionController::class, 'destroy']);
