<?php

use Illuminate\Support\Facades\Route;
Route::middleware(['check.company',
                'auth:sanctum',
                config('jetstream.auth_session'),
                'verified',])->group(function () {
    Route::get('/', [\App\Http\Controllers\SiteController::class, 'dashboard'])->name('frontoffice.home');
    Route::get('/calendar', [\App\Http\Controllers\SiteController::class, 'calendar'])->name('frontoffice.calendar');
    Route::get('/calendar/frontoffice/get-vacations', [\App\Http\Controllers\SiteController::class, 'frontOfficeGetVacations'])->name('frontoffice.calendar.get-vacations');
    Route::get('/calendar/frontoffice/get-team-vacations', [\App\Http\Controllers\SiteController::class, 'frontOfficeGetTeamVacations'])->name('frontoffice.calendar.get-team-vacations');
    Route::post('/calendar/frontoffice/save-vacations', [\App\Http\Controllers\SiteController::class, 'calendarSaveVacations'])->name('frontoffice.calendar.save-vacations');
    Route::get('/warning/{message}', [\App\Http\Controllers\WarningHelper::class, 'display_warning_back'])->name('display_warning');
    Route::get('/warning/{message}', [\App\Http\Controllers\WarningHelper::class, 'display_warning'])->name('display_warning');

    Route::get('/admin/cookies-policy', [\App\Http\Controllers\DashboardController::class,'cookiesPolicy'])->name('dashboard.cookies_policy');
    Route::get('/admin/privacy-policy', [\App\Http\Controllers\DashboardController::class,'privacyPolicy'])->name('dashboard.privacy_policy');
    Route::get('/admin/terms-of-service', [\App\Http\Controllers\DashboardController::class,'termsOfService'])->name('dashboard.terms_of_service');

    Route::get('theme-switcher/{activeTheme}', [\App\Http\Controllers\ThemeController::class, 'switch'])->name('theme-switcher');
    Route::get('layout-switcher/{activeLayout}', [\App\Http\Controllers\LayoutController::class, 'switch'])->name('layout-switcher');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'check.not.company'
])->prefix('admin')->group(function () {
    Route::resource('companies', App\Http\Controllers\CompanyController::class);
    Route::get('/apply-register/company', [\App\Http\Controllers\DashboardController::class,'apply_register_company_index'])->name('dashboard.apply-register-company');
    Route::get('/apply-register/company/join', [\App\Http\Controllers\CompanyController::class,'join'])->name('companies.join');
    Route::post('/apply-register/company/request-join', [\App\Http\Controllers\CompanyController::class,'requestJoin'])->name('companies.request-join');
    Route::delete('/apply-register/company/delete-join', [\App\Http\Controllers\CompanyController::class,'deleteJoin'])->name('companies.delete-join');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'manager.access',
    'check.company'
])->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

    Route::get('/company/dashboard', [\App\Http\Controllers\CompanyController::class,'companyDashboard'])->name('companies.dashboard');
    Route::patch('/user/profile', [App\Http\Controllers\UserController::class, 'updateMe'])->name('users.update_me');
    Route::get('/company/users/pending', [App\Http\Controllers\UserController::class, 'companyUsersPending'])->name('companies.users.pending');
    Route::get('/company/users/approve/{user}', [App\Http\Controllers\UserController::class, 'companyUsersApprove'])->name('companies.users.approve');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('teams', App\Http\Controllers\TeamController::class);
    Route::resource('user-team-requests', App\Http\Controllers\UserTeamRequestsController::class);
    Route::resource('vacations', App\Http\Controllers\VacationController::class);
    Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/get-vacations', [App\Http\Controllers\CalendarController::class, 'getVacations'])->name('calendar.get-vacations');
    Route::get('/calendar/get-session-vacation', [App\Http\Controllers\CalendarController::class, 'getSessionVacation'])->name('calendar.get-session-vacation');
    Route::post('/calendar/update-selected-vacation', [App\Http\Controllers\CalendarController::class, 'UpdateSelectedVacation'])->name('calendar.update-selected-vacation');
    Route::post('/calendar/create', [App\Http\Controllers\CalendarController::class, 'create'])->name('calendar.create');
    Route::post('/calendar/remove', [App\Http\Controllers\CalendarController::class, 'remove'])->name('calendar.remove');
    Route::post('/calendar/edit', [App\Http\Controllers\CalendarController::class, 'edit'])->name('calendar.edit');
    Route::impersonate();

    Route::resource('settings', App\Http\Controllers\SettingController::class);
    Route::get('translations/{groupKey?}', '\Barryvdh\TranslationManager\Controller@getIndex')->where('groupKey', '.*')->name('translations.index');

    Route::get('/demos/create-livewire', [App\Http\Controllers\DemoController::class, 'createLivewire'])->name('demos.create_livewire');
    Route::get('/demos/{demo}/edit-livewire', [App\Http\Controllers\DemoController::class, 'editLivewire'])->name('demos.edit_livewire');
    Route::resource('demos', App\Http\Controllers\DemoController::class);
});

