<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FrontEndController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/web',[FrontEndController::class,'index'])->name('web');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        // Route::get('tenders',[TenderController::class, 'index'])->name('tenders.index');
        Route::resource('tenders', TenderController::class)->names([
            'index' => 'tenders.index',
            'create' => 'tenders.create',
            'store' => 'tenders.store',
            'edit' => 'tenders.edit',
            'update' => 'tenders.update',
            'destroy' => 'tenders.destroy'
        ]);
    });
});
Route::middleware(['auth:admin', 'admin.super'])->group(function () {
    Route::resource('admin', AuthController::class)->names([
        'index' => 'admin.index',
        'create' => 'admin.create',
        'store' => 'admin.store',
        'edit' => 'admin.edit',
        'update' => 'admin.update',
        'destroy' => 'admin.destroy'
    ]);
});
