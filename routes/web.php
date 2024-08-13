<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])
    ->name('front.index');

Route::get('/cek-status', [FrontController::class, 'cekStatus'])
    ->name('front.status');

Route::post('/cek-status/details', [FrontController::class, 'cekStatus_details'])
    ->name('front.status.details');

    
// Route::get('/', function () {
//     return view('tes');
// });
