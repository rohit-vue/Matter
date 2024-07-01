<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SettingsWorkflowController;

//! Public Routes
Route::post('login', [UserController::class, 'loginUser'])->name('login');
// Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::post('verify/{token}', [UserController::class, 'verifyEmail'])->name('verification.verify');
Route::post('resetpass', [PasswordResetController::class, 'send_reset_password_email']);
Route::post('resetpass/{token}', [PasswordResetController::class, 'reset']);

//! Protected Routes
Route::group(['middleware' => 'api'], function ($routes) {
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
});

//Settings->Webflow
Route::post('settings/workflow/tasks',[SettingsWorkflowController::class,'tasks']);
Route::get('settings/workflow/tasks',[SettingsWorkflowController::class,'show_tasks']);
Route::post('settings/workflow/qualitycontrol',[SettingsWorkflowController::class,'qualityControl']);
Route::get('settings/workflow/qualitycontrol',[SettingsWorkflowController::class,'show_qualityControl']);
Route::get('settings/workflow/samplingstages',[SettingsWorkflowController::class,'samplingstages']);
Route::post('settings/workflow/samplingstages',[SettingsWorkflowController::class,'show_samplingstages']);
Route::post('settings/workflow/seasons',[SettingsWorkflowController::class,'seasons']);
Route::get('settings/workflow/seasons',[SettingsWorkflowController::class,'show_seasons']);


Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['role:admin'])->group(function () {
    Route::get('/users', [AdminController::class, 'index']);
    Route::patch('/users/{id}/role', [AdminController::class, 'updateRole']);
});

// Invitation routes
Route::post('/invitations', [InvitationController::class, 'store']);


