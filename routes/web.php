<?php

use App\Http\Controllers\Backend\AdminCategoryController;
use App\Http\Controllers\Backend\AdminManagementController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\ProviderManagementController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Provider\DashboardController as ProviderDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::get('{slugname}/login', [AuthController::class, 'login'])->where(['admin', 'provider'])->name('admin.login');
Route::post('{slugname}/login', [AuthController::class, 'loginPost'])->name('admin.login.post');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admins')->group(function () {
        Route::get('list', [AdminManagementController::class, 'adminList'])->name('admin.admins.list');
        Route::get('create', [AdminManagementController::class, 'adminCreate'])->name('admin.admins.create');
        Route::post('store', [AdminManagementController::class, 'adminStore'])->name('admin.admins.store');
        Route::get('edit/{id}', [AdminManagementController::class, 'adminEdit'])->name('admin.admins.edit');
        Route::post('update/{id}', [AdminManagementController::class, 'adminUpdate'])->name('admin.admins.update');
        Route::post('delete/{id}', [AdminManagementController::class, 'adminDelete'])->name('admin.admins.delete');
    });

    Route::prefix('providers')->group(function () {
        Route::get('list', [ProviderManagementController::class, 'providerList'])->name('admin.providers.list');
        Route::get('create', [ProviderManagementController::class, 'providerCreate'])->name('admin.providers.create');
        Route::post('store', [ProviderManagementController::class, 'providerStore'])->name('admin.providers.store');
        Route::get('edit/{id}', [ProviderManagementController::class, 'providerEdit'])->name('admin.providers.edit');
        Route::post('update/{id}', [ProviderManagementController::class, 'providerUpdate'])->name('admin.providers.update');
        Route::post('delete/{id}', [ProviderManagementController::class, 'providerDelete'])->name('admin.providers.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('list', [UserManagementController::class, 'userList'])->name('admin.users.list');
        Route::get('view/{id}', [UserManagementController::class, 'userView'])->name('admin.users.view');
        Route::post('status/{id}', [UserManagementController::class, 'userStatus'])->name('admin.users.ban');
        // Route::post('delete/{id}', [UserManagementController::class, 'userDelete'])->name('admin.users.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('list', [AdminCategoryController::class, 'categoryList'])->name('admin.category.list');
        Route::get('create', [AdminCategoryController::class, 'categoryCreate'])->name('admin.category.create');
        Route::post('store', [AdminCategoryController::class, 'categoryStore'])->name('admin.category.store');
        Route::get('edit/{id}', [AdminCategoryController::class, 'categoryEdit'])->name('admin.category.edit');
        Route::post('update/{id}', [AdminCategoryController::class, 'categoryUpdate'])->name('admin.category.update');
        Route::post('delete/{id}', [AdminCategoryController::class, 'categoryDelete'])->name('admin.category.delete');
    });

    Route::post('logout', [AuthController::class, 'adminlogout'])->name('admin.logout');
});

Route::prefix('provider')->group(function () {
    Route::get('dashboard', [ProviderDashboardController::class, 'index'])->name('provider.dashboard');

    Route::post('logout', [AuthController::class, 'adminlogout'])->name('provider.logout');
});
