<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('domains/{domain}', [Controllers\DomainsController::class, 'show'])->name('domains.show');

Route::middleware('guest')->group(function () {

    Route::get('login', [Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [Auth\AuthenticatedSessionController::class, 'store']);

});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::post('/logout', [AUth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('settings')->name('settings.')->group(function () {

        Route::get('general', [Admin\SettingsController::class, 'editGeneral'])->name('general');
        Route::post('general', [Admin\SettingsController::class, 'updateGeneral'])->name('general.update');

    });

});
