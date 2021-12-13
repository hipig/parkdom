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

Route::post('locale', [Controllers\LocaleController::class, 'update'])->name('locale.update');

Route::middleware([])->group(function () {

    Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

    Route::get('domains', [Controllers\DomainsController::class, 'index'])->name('domains.index');
    Route::get('domains/{domain}', [Controllers\DomainsController::class, 'show'])->name('domains.show');

});

Route::middleware('guest')->group(function () {

    Route::get('login', [Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [Auth\AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth')->group(function () {

    // User
    Route::get('dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Account
    Route::prefix('account')->name('account.')->group(function () {

        Route::get('/', [Controllers\AccountController::class, 'index'])->name('index');

        Route::get('profile', [Controllers\AccountController::class, 'profile'])->name('profile');
        Route::post('profile', [Controllers\AccountController::class, 'updateProfile'])->name('profile.update');

        Route::get('security', [Controllers\AccountController::class, 'security'])->name('security');
        Route::post('security', [Controllers\AccountController::class, 'updateSecurity'])->name('security.update');

    });

    // Admin
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::post('/logout', [AUth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('profile', [Admin\ProfileController::class, 'index'])->name('profile');
        Route::post('profile', [Admin\ProfileController::class, 'updateProfile'])->name('profile.update');

        Route::prefix('settings')->name('settings.')->group(function () {

            Route::get('general', [Admin\SettingsController::class, 'editGeneral'])->name('general');
            Route::post('general', [Admin\SettingsController::class, 'updateGeneral'])->name('general.update');

            Route::get('domain', [Admin\SettingsController::class, 'editDomain'])->name('domain');
            Route::post('domain', [Admin\SettingsController::class, 'updateDomain'])->name('domain.update');

            Route::get('offer', [Admin\SettingsController::class, 'editOffer'])->name('offer');
            Route::post('offer', [Admin\SettingsController::class, 'updateOffer'])->name('offer.update');

            Route::get('mail', [Admin\SettingsController::class, 'editMail'])->name('mail');
            Route::post('mail', [Admin\SettingsController::class, 'updateMail'])->name('mail.update');
            Route::post('mail/send', [Admin\SettingsController::class, 'sendTestMail'])->middleware('cover.config.mail')->name('mail.testSend');

            Route::get('contact', [Admin\SettingsController::class, 'editContact'])->name('contact');
            Route::post('contact', [Admin\SettingsController::class, 'updateContact'])->name('contact.update');

            Route::resource('currencies', Admin\CurrenciesController::class);
        });

        Route::resource('domain-categories', Admin\DomainCategoriesController::class)->parameters([
            'domain-categories' => 'category'
        ])->names('domainCategories');

        Route::resource('domains', Admin\DomainsController::class);

        Route::resource('offers', Admin\OffersController::class)->only('index', 'show');

        Route::resource('contacts', Admin\ContactsController::class)->only('index', 'show');

        Route::get('languages/download', [Admin\LanguagesController::class, 'download'])->name('languages.download');
        Route::resource('languages', Admin\LanguagesController::class);

        Route::get('domain-visits', [Admin\DomainVisitsController::class, 'index'])->name('domainVisits.index');
        Route::get('domain-visits/export', [Admin\DomainVisitsController::class, 'export'])->name('domainVisits.export');

        Route::prefix('statistics')->name('statistics.')->group(function () {
            Route::get('domain-visit', [Admin\DomainVisitStatisticsController::class, 'index'])->name('visit');

            Route::get('offer', [Admin\OfferStatisticsController::class, 'index'])->name('offer');

            Route::get('domain', [Admin\DomainStatisticsController::class, 'index'])->name('domain');
            Route::get('domain/visit', [Admin\DomainStatisticsController::class, 'countVisit'])->name('domain.visit');
            Route::get('domain/visit/export', [Admin\DomainStatisticsController::class, 'countVisitExport'])->name('domain.visit.export');
            Route::get('domain/hit', [Admin\DomainStatisticsController::class, 'countHit'])->name('domain.hit');
            Route::get('domain/hit/export', [Admin\DomainStatisticsController::class, 'countHitExport'])->name('domain.hit.export');

        });
    });

});

