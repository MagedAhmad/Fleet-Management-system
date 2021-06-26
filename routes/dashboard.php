<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\TripController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\StationController;
use App\Http\Controllers\Dashboard\StoppageController;
use App\Http\Controllers\Accounts\Dashboard\UserController;
use App\Http\Controllers\Accounts\Dashboard\AdminController;
use App\Http\Controllers\Settings\Dashboard\SettingController;
use App\Http\Controllers\Accounts\Dashboard\CustomerController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('locale/{locale}', [LocaleController::class, 'update'])
    ->name('locale')
    ->where('locale', '(ar|en)');

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::prefix('accounts')->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('admins', AdminController::class);
});

Route::patch('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');

// Settings
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

// stations
Route::resource('stations', StationController::class);
// trips
Route::resource('trips', TripController::class);
// stoppages
Route::resource('trips/{trip}/stoppages', StoppageController::class);