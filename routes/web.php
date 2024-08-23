<?php

use App\Filament\Resources\RequestSubmissionResource\Pages\ViewCustomPage;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontController::class, 'index'])
    ->name('front.index');

Route::get('/services', [FrontController::class, 'services'])
    ->name('front.services');

Route::get('/cek-status', [FrontController::class, 'cekStatus'])
    ->name('front.status');

Route::post('/cek-status/details', [FrontController::class, 'cekStatus_details'])
    ->name('front.status.details');

Route::get('/service/{slug}/form', [ServiceController::class, 'showForm'])
    ->name('front.service.form');

Route::post('/service/layanan-vps/form', [ServiceController::class, 'handleFormSubmissionVPS'])
    ->name('form.submitvps');

Route::post('/service/layanan-clearance/form', [ServiceController::class, 'handleFormSubmissionClearance'])
    ->name('form.submitclearance');

Route::post('/service/layanan-domain/form', [ServiceController::class, 'handleFormSubmissionDomain'])
    ->name('form.submitdomain');

Route::post('/service/layanan-hosting/form', [ServiceController::class, 'handleFormSubmissionHosting'])
    ->name('form.submithosting');

Route::get('/success/{id}', [ServiceController::class, 'success'])
    ->name('forms.success');

    // Route::get('/success/{id}', [ServiceController::class, 'success'])
    // ->name('forms.success');
