<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\TenderController;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        // Route::get('tenders',[TenderController::class, 'index'])->name('tenders.index');
        Route::resource('tenders', TenderController::class)->names([
            'index' => 'tenders.index',
            'create' => 'tenders.create',
            'store' => 'admin.tenders.store',
            'edit' => 'admin.tenders.edit',
            'update' => 'admin.tenders.update',
            'destroy' => 'admin.tenders.destroy'
        ]);
    });
});
