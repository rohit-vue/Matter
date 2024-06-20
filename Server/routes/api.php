<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SettingsWorkflowController;

//! Public Routes
Route::post('login', [UserController::class, 'loginUser'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::post('verify/{token}', [UserController::class, 'verifyEmail'])->name('verification.verify');
Route::post('resetpass', [PasswordResetController::class, 'send_reset_password_email']);
Route::post('resetpass/{token}', [PasswordResetController::class, 'reset']);

//! Protected Routes
Route::group(['middleware' => 'api'], function ($routes) {
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

//Settings->Webflow
Route::post('settings/workflow/tasks',[SettingsWorkflowController::class,'tasks']);
Route::get('settings/workflow/tasks',[SettingsWorkflowController::class,'show_tasks']);
Route::post('settings/workflow/qualitycontrol',[SettingsWorkflowController::class,'qualityControl']);
Route::get('settings/workflow/qualitycontrol',[SettingsWorkflowController::class,'show_qualityControl']);



