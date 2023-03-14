<?php

use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/signup', [OfficeController::class, 'signup'])->name('signup');
Route::post('/signup', [OfficeController::class, 'signupPost'])->name('signup-post');
Route::prefix('super-admin')->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('super-admin.index');
    Route::get('/login', [SuperAdminController::class, 'login'])->name('super-admin.login');
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('super-admin.dashboard');
    Route::get('/workspaces', [SuperAdminController::class, 'workspaces'])->name('super-admin.workspaces');
    Route::get('/users', [SuperAdminController::class, 'users'])->name('super-admin.users');
    Route::get('/payments', [SuperAdminController::class, 'payments'])->name('super-admin.payments');
    Route::get('/files', [SuperAdminController::class, 'files'])->name('super-admin.files');
    Route::get('/landing-page', [SuperAdminController::class, 'landingPage'])->name('super-admin.landing-page');
    Route::get('/post-editor/{uuid}', [SuperAdminController::class, 'postEditor'])->name('super-admin.post-editor');
    Route::get('/go-to/{where}', [SuperAdminController::class, 'goTo'])->name('super-admin.go-to');
    Route::get('/subscription-plans', [SuperAdminController::class, 'subscriptionPlans'])->name('super-admin.subscription-plans');
    Route::get('/subscription-plan', [SuperAdminController::class, 'subscriptionPlan'])->name('super-admin.subscription-plan');
    Route::post('/subscription-plan', [SuperAdminController::class, 'saveSubscriptionPlan'])->name('super-admin.save-subscription-plan');
    Route::post('/payment-gateway', [SuperAdminController::class, 'savePaymentGateway'])->name('super-admin.save-payment-gateway');
    Route::post('/save-post', [SuperAdminController::class, 'savePost'])->name('super-admin.save-post');
    Route::post('/save-user', [SuperAdminController::class, 'saveUser'])->name('super-admin.save-user');
    Route::get('/reports/{type}', [SuperAdminController::class, 'reports'])->name('super-admin.reports');
    Route::get('/settings', [SuperAdminController::class, 'settings'])->name('super-admin.settings');
    Route::get('/delete/{item}/{uuid}', [SuperAdminController::class, 'deleteItem'])->name('super-admin.delete-item');
    Route::get('/view-user/{uuid}', [SuperAdminController::class, 'viewUser'])->name('super-admin.view-user');
    Route::get('/view-workspace/{uuid}', [SuperAdminController::class, 'viewWorkspace'])->name('super-admin.view-workspace');
    Route::post('/save-post-content', [SuperAdminController::class, 'savePostContent'])->name('super-admin.save-post-content');
});
