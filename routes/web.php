<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
    Route::get("/data_kamar",[AdminController::class,'data_kamar']);
    Route::get("/room_detail/{id}",[HomeController::class,'room_detail']);
    Route::get("/create_kamar",[AdminController::class,'create_kamar']);
    Route::get("/kamar_update/{id}",[AdminController::class,'kamar_update']);
    Route::get("/kamar_delete/{id}",[AdminController::class,'kamar_delete']);
    Route::get('/booked_kamar',[AdminController::class,'booked_kamar']);
    Route::get('/booking_update/{id}',[AdminController::class,'booking_update']);
    Route::get('/booking_delete/{id}',[AdminController::class,'booking_delete']);
});

Route::get("/",[AdminController::class,'home']);

Route::post('/edit_booking/{id}',[AdminController::class,'edit_booking']);
Route::post('/edit_kamar/{id}',[AdminController::class,'edit_kamar']);
Route::post('/tambah_kamar',[AdminController::class,'tambah_kamar']);



Route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

