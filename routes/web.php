<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ReciptController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'index')->name('customer');
        Route::post('/customer', 'store')->name('customer.store');
        Route::post('/customer/{id}', 'update')->name('customer.update');
        Route::delete('/customer/{id}', 'destroy')->name('customer.delete');
    });

    Route::controller(StaffController::class)->group(function () {
        Route::get('/staff', 'index')->name('staff');
        Route::post('/staff', 'store')->name('staff.store');
        Route::post('/staff/{id}', 'update')->name('staff.update');
        Route::delete('/staff/{id}', 'destroy')->name('staff.destroy');
    });

    Route::controller(JobController::class)->group(function () {
        Route::get('/jobs', 'index')->name('jobs');
        Route::post('/jobs', 'store')->name('jobs.store');
        Route::post('/jobs/{id}', 'update')->name('jobs.update');
        Route::delete('/jobs/{id}', 'destroy')->name('jobs.destroy');
    });

    Route::controller(ReciptController::class)->group(function () {
        Route::get('/recipts', 'recipts')->name('recipts');
        Route::post('/recipts', 'storeRecipts')->name('recipts.store');
        Route::post('/recipts/{id}', 'updateRecipts')->name('recipts.update');
        Route::delete('/recipts/{id}', 'destroyRecipts')->name('recipts.destroy');
    });

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';