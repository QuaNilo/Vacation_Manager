<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('home');


Route::get('/admin/cookies-policy', [\App\Http\Controllers\DashboardController::class,'cookiesPolicy'])->name('dashboard.cookies_policy');
Route::get('/admin/privacy-policy', [\App\Http\Controllers\DashboardController::class,'privacyPolicy'])->name('dashboard.privacy_policy');
Route::get('/admin/terms-of-service', [\App\Http\Controllers\DashboardController::class,'termsOfService'])->name('dashboard.terms_of_service');

Route::get('theme-switcher/{activeTheme}', [\App\Http\Controllers\ThemeController::class, 'switch'])->name('theme-switcher');
Route::get('layout-switcher/{activeLayout}', [\App\Http\Controllers\LayoutController::class, 'switch'])->name('layout-switcher');
Route::get('calendar', [\App\Http\Controllers\Calendar::class, 'index'])->name('calendar.index');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'manager.access',
])->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

    Route::patch('/user/profile', [App\Http\Controllers\UserController::class, 'updateMe'])->name('users.update_me');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('companies', App\Http\Controllers\CompanyController::class);
    Route::resource('teams', App\Http\Controllers\TeamController::class);
    Route::resource('user-team-requests', App\Http\Controllers\UserTeamRequestsController::class);
    Route::resource('vacations', App\Http\Controllers\VacationController::class);

    Route::impersonate();

    Route::resource('settings', App\Http\Controllers\SettingController::class);
    Route::get('translations/{groupKey?}', '\Barryvdh\TranslationManager\Controller@getIndex')->where('groupKey', '.*')->name('translations.index');

    Route::get('/demos/create-livewire', [App\Http\Controllers\DemoController::class, 'createLivewire'])->name('demos.create_livewire');
    Route::get('/demos/{demo}/edit-livewire', [App\Http\Controllers\DemoController::class, 'editLivewire'])->name('demos.edit_livewire');
    Route::resource('demos', App\Http\Controllers\DemoController::class);
});

