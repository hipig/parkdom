<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function () {

    Route::get('currencies', [Api\CurrenciesController::class, 'index'])->name('currencies');

    Route::post('domains/{domain}/offers', [Api\OffersController::class, 'store'])->middleware('cover.config.mail')->name('domains.offers.store');

});
