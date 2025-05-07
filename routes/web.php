<?php

use App\Http\Controllers\Backend\AdminCategoryController;
use App\Http\Controllers\Backend\AdminManagementController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\ComplaintController;
use App\Http\Controllers\Backend\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ProviderManagementController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Backend\WalletController as AdminWalletController;
use App\Http\Controllers\Provider\DashboardController as ProviderDashboardController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('user.index');
Route::get('contact', [IndexController::class, 'contact'])->name('user.contact');
Route::get('login', [IndexController::class, 'login'])->name('user.login');
Route::get('register', [IndexController::class, 'register'])->name('user.register');
Route::post('login', [IndexController::class, 'userLogin'])->name('user.login.post');
Route::post('register', [IndexController::class, 'userRegister'])->name('user.register.post');

Route::post('logout', [IndexController::class, 'logout'])->name('user.logout');

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

    Route::prefix('wallet')->group(function () {
        Route::get('list', [AdminWalletController::class, 'walletList'])->name('admin.wallets.list');
        Route::get('view/{id}', [AdminWalletController::class, 'walletView'])->name('admin.wallets.view');
        Route::post('status/{id}', [AdminWallletController::class, 'walletStatus'])->name('admin.wallets.status');
    });

    Route::post('logout', [AuthController::class, 'adminlogout'])->name('admin.logout');
});

Route::prefix('provider')->group(function () {
    Route::get('dashboard', [ProviderDashboardController::class, 'index'])->name('provider.dashboard');

    Route::prefix('wallet')->group(function () {
        Route::get('list', [AdminWalletController::class, 'providerWalletList'])->name('provider.wallets.list');
        Route::get('create', [AdminWalletController::class, 'providerWalletCreate'])->name('provider.wallets.create');
        Route::post('store', [AdminWalletController::class, 'providerWalletStore'])->name('provider.wallets.store');
        Route::get('view/{id}', [AdminWalletController::class, 'providerWalletView'])->name('provider.wallets.view');
        Route::post('update/{id}', [AdminWalletController::class, 'providerWalletUpdate'])->name('provider.wallets.update');
        Route::post('delete/{id}', [AdminWalletController::class, 'providerWalletDelete'])->name('provider.wallets.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('list', [UserManagementController::class, 'userList'])->name('provider.users.list');
        Route::get('view/{id}', [UserManagementController::class, 'userView'])->name('provider.users.view');
        Route::post('status/{id}', [UserManagementController::class, 'userStatus'])->name('provider.users.ban');
        // Route::post('delete/{id}', [UserManagementController::class, 'userDelete'])->name('admin.users.delete');
    });

    Route::prefix('services')->group(function () {
        Route::get('list', [ServiceController::class, 'providerServiceList'])->name('provider.services.list');
        Route::get('create', [ServiceController::class, 'providerServiceCreate'])->name('provider.services.create');
        Route::post('store', [ServiceController::class, 'providerServiceStore'])->name('provider.services.store');
        Route::get('edit/{id}', [ServiceController::class, 'providerServiceEdit'])->name('provider.services.edit');
        Route::post('update/{id}', [ServiceController::class, 'providerServiceUpdate'])->name('provider.services.update');
        Route::post('delete/{id}', [ServiceController::class, 'providerServiceDelete'])->name('provider.services.delete');
    });

    Route::prefix('bookings')->group(function () {
        Route::get('list', [BookingController::class, 'providerBookingList'])->name('provider.bookings.list');
        Route::get('{id}', [BookingController::class, 'providerBookingView'])->name('provider.bookings.view');
        Route::post('status/{id}', [BookingController::class, 'providerBookingStatus'])->name('provider.bookings.status');
        Route::post('reject/{id}', [BookingController::class, 'providerBookingReject'])->name('provider.bookings.reject');
    });

    Route::prefix('payments')->group(function () {
        Route::get('list', [PaymentController::class, 'providerPaymentList'])->name('provider.payments.list');
        Route::post('status/{id}', [PaymentController::class, 'providerPaymentStatus'])->name('provider.payments.status');
        Route::post('reject/{id}', [PaymentController::class, 'providerPaymentReject'])->name('provider.payments.reject');

    });

    Route::prefix('reviews')->group(function () {
        Route::get('list', [ReviewController::class, 'providerReviewList'])->name('provider.reviews.list');
    });

    Route::prefix('complaints')->group(function () {
        Route::get('list', [ComplaintController::class, 'providerComplaintList'])->name('provider.complaints.list');
        Route::post('status/{id}', [ComplaintController::class, 'providerComplaintStatus'])->name('provider.complaints.status');
        Route::post('close/{id}', [ComplaintController::class, 'providerComplaintReject'])->name('provider.complaints.reject');
    });

    Route::post('logout', [AuthController::class, 'providerLogout'])->name('provider.logout');
});

Route::get('/services', [IndexController::class, 'servicePage'])->name('user.services.index');
Route::post('/services/book/{id}', [IndexController::class, 'serviceBooking'])->name('user.services.book');
Route::get('/bookings', [BookingController::class, 'index'])->name('user.booking');
Route::post('/bookings/confirm', [BookingController::class, 'confirmBooking'])->name('user.bookings.confirm');
