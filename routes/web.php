<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/about', function () {
    return view('home.about');
});

Route::get('/room', function () {
    return view('home.room');
});

Route::get('/blog', function () {
    return view('home.blog');
});

Route::get('/contact', function () {
    return view('home.contact');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get("/home",[AdminController::class,'index'])->name('home');
});

Route::get("/",[AdminController::class,'home']);

Route::get("/create_kamar",[AdminController::class,'create_kamar']);
Route::post('/tambah_kamar',[AdminController::class,'tambah_kamar']);

Route::get("/data_kamar",[AdminController::class,'data_kamar']);

Route::get("/kamar_update/{id}",[AdminController::class,'kamar_update']);
Route::post('/edit_kamar/{id}',[AdminController::class,'edit_kamar']);
Route::get("/kamar_delete/{id}",[AdminController::class,'kamar_delete']);
