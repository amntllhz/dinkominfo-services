<?php

use App\Filament\Resources\RequestSubmissionResource\Pages\ViewCustomPage;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontController::class, 'index'])
    ->name('front.index');


Route::get('/services', [FrontController::class, 'services'])
    ->name('front.services');

Route::get('/cek-status', [FrontController::class, 'cekStatus'])
    ->name('front.status');

Route::post('/cek-status', [FrontController::class, 'cekStatus_details'])
    ->name('front.status.details');

Route::get('/service/{slug}', [ServiceController::class, 'viewForm'])
    ->name('form.layanan');

Route::post('/service/submit', [ServiceController::class, 'submitForm'])
    ->name('form.submit');

Route::get('/service/success/{id}', [ServiceController::class, 'success'])
    ->name('forms.success');

Route::post('/instansi', [InstansiController::class, 'store']);

Route::get('/report', [ReportController::class, 'formReport'])
    ->name('form.report');

Route::post('/report', [ReportController::class, 'handlFormReport'])
    ->name('form.handlereport');

Route::get('/report/success/{id}', [ReportController::class, 'success'])
    ->name('form.successreport');
