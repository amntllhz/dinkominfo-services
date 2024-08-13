<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])
    ->name('front.index');

Route::get('/cek-status', [FrontController::class, 'cekStatus'])
    ->name('front.status');

Route::post('/cek-status/details', [FrontController::class, 'cekStatus_details'])
    ->name('front.status.details');

Route::get('/service/{slug}/form', [ServiceController::class, 'showForm'])
    ->name('front.service.form');

    
// Route::get('/', function () {
//     return view('tes');
// });
