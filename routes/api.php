<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BusController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Accounts\SelectController;
use App\Http\Controllers\Accounts\Api\LoginController;
use App\Http\Controllers\Accounts\Api\ProfileController;
use App\Http\Controllers\Settings\Api\SettingController;
use App\Http\Controllers\Accounts\Api\RegisterController;
use App\Http\Controllers\Accounts\Api\ResetPasswordController;
use App\Http\Controllers\Notifications\Api\NotificationController;
use App\Http\Controllers\Countries\SelectController as CountrySelectController;
use App\Http\Controllers\Notifications\SelectController as NotificationsSelectController;

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

// profiles

Route::post('/register', [RegisterController::class, 'register'])->name('sanctum.register');
Route::post('/login', [LoginController::class, 'login'])->name('sanctum.login');

Route::post('/password/forget', [ResetPasswordController::class, 'forget'])->name('api.password.forget');
Route::post('/password/code', [ResetPasswordController::class, 'code'])->name('api.password.code');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('api.password.reset');


Route::get('/select/users', [SelectController::class, 'index'])->name('users.select');
Route::get('user/search', [ProfileController::class, 'search']);

// Settings
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');

Route::middleware(['auth:sanctum'])->group(
    function () {
        // Bookings
        Route::post('bookings', [BookingController::class, 'book']);

    }
);
// buses
Route::post('buses/{bus}/available_seats', [BusController::class, 'available_seats']);

// trips
Route::resource('trips', TripController::class)->only(['index', 'show']);