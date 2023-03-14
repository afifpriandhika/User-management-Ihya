<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SecurityController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\UserVerificationController;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'homeAdmin'])->name('admin.home');
    Route::get('/admin/userManagement/addUserData', [App\Http\Controllers\Admin\UserManagementController::class, 'showAddUserData'])->name('addUserData');
    Route::post('/admin/userManagement/addUserData', [App\Http\Controllers\Admin\UserManagementController::class, 'store'])->name('storeUser');
    Route::get('admin/userManagement/userData', [App\Http\Controllers\Admin\UserManagementController::class, 'index'])->name('userData');
    Route::get('admin/userManagement/editUserData/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'showEditUserData'])->name('editUserData');
    Route::put('admin/userManagement/editUserData/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'update']);
    Route::get('/admin/userVerification/pendingUser', [App\Http\Controllers\Admin\UserVerificationController::class, 'showPendingVerification'])->name('pendingUser');
    Route::get('admin/userManagement/destroy/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'destroy']);
    
    Route::put('/admin/userVerification/approve/{id}', [App\Http\Controllers\Admin\UserVerificationController::class, 'approve']);
    Route::put('/admin/userVerification/reject/{id}', [App\Http\Controllers\Admin\UserVerificationController::class, 'reject']);
    
    Route::get('/admin/userVerification/approvedUser', [App\Http\Controllers\Admin\UserVerificationController::class, 'showApprovedUser'])->name('approvedUser');
    Route::get('/admin/userVerification/rejectedUser', [App\Http\Controllers\Admin\UserVerificationController::class, 'showRejectedUser'])->name('rejectedUser');
    Route::put('/admin/userVerification/revoke/{id}', [App\Http\Controllers\Admin\UserVerificationController::class, 'revoke']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('role');

// USER ROUTES
Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');

Route::get('/profile/updateBasicInfo', [App\Http\Controllers\User\ProfileController::class, 'showUpdateBasicInfo'])->name('updateBasicInfo');
Route::put('/profile/updateBasicInfo/{id}', [App\Http\Controllers\User\ProfileController::class, 'updateBasicInfo']);

Route::get('/profile/updateIdentity', [App\Http\Controllers\User\ProfileController::class, 'showUpdateIdentity'])->name('updateIdentity');
Route::put('/profile/updateIdentity/{id}', [App\Http\Controllers\User\ProfileController::class, 'updateIdentity']);

Route::get('/profile/updateContact', [App\Http\Controllers\User\ProfileController::class, 'showUpdateContact'])->name('updateContact');
Route::put('/profile/updateContact/{id}', [App\Http\Controllers\User\ProfileController::class, 'updateContact']);

Route::get('/security', [App\Http\Controllers\User\SecurityController::class, 'index'])->name('security');
Route::put('/security/updatePassword/{id}', [App\Http\Controllers\User\SecurityController::class, 'updatePassword']);

Route::get('/transaction/products', [App\Http\Controllers\User\TransactionController::class, 'showProduct'])->name('product');
Route::get('/transaction/history', [App\Http\Controllers\User\TransactionController::class, 'showtransaction'])->name('transaction');
Route::get('/transaction/portfolio', [App\Http\Controllers\User\TransactionController::class, 'portfolio'])->name('portfolio');
Route::get('/transaction/createdDonation', [App\Http\Controllers\User\TransactionController::class, 'showDonation'])->name('donation');
Route::get('/transaction/donationHistory', [App\Http\Controllers\User\TransactionController::class, 'showDonationHistory'])->name('donationHistory');


// ADMIN CONTROLLER
// Route::get('admin/userManagement/userData', [App\Http\Controllers\Admin\UserManagementController::class, 'index'])->name('userData')->middleware('role');
// Route::get('admin/userManagement/destroy/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'destroy'])->middleware('role');

// Route::get('admin/userManagement/editUserData/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'showEditUserData'])->name('editUserData')->middleware('role');
// Route::put('admin/userManagement/editUserData/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'update'])->middleware('role');

// Route::get('/admin/userManagement/addUserData', [App\Http\Controllers\Admin\UserManagementController::class, 'showAddUserData'])->name('addUserData')->middleware('role');
// Route::post('/admin/userManagement/addUserData', [App\Http\Controllers\Admin\UserManagementController::class, 'store'])->name('storeUser')->middleware('role');

// Route::put('admin/userManagement/resetUserIdentity/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'resetUserIdentity'])->middleware('role');

// Route::get('/admin/userVerification/pendingUser', [App\Http\Controllers\Admin\UserVerificationController::class, 'showPendingVerification'])->name('pendingUser')->middleware('role');
// Route::get('/admin/userVerification/verifiedUser', [App\Http\Controllers\Admin\UserVerificationController::class, 'showUserVerified'])->name('verifiedUser')->middleware('role');
// Route::get('/admin/userVerification/deniedUser', [App\Http\Controllers\Admin\UserVerificationController::class, 'showUserDenied'])->name('deniedUser')->middleware('role');

// Route::put('/admin/userVerification/approveUserIdentity/{id}', [App\Http\Controllers\Admin\UserVerificationController::class, 'approveUserIdentity'])->middleware('role');
// Route::put('/admin/userVerification/denyUserIdentity/{id}', [App\Http\Controllers\Admin\UserVerificationController::class, 'denyUserIdentity'])->middleware('role');
// Route::put('/admin/userVerification/revokeVerification/{id}', [App\Http\Controllers\Admin\UserVerificationController::class, 'revokeVerification'])->middleware('role');

// Route::get('/admin/security', [App\Http\Controllers\User\SecurityController::class, 'adminIndex'])->name('adminSecurity')->middleware('role');
// Route::put('/admin/security/updatePassword/{id}', [App\Http\Controllers\User\SecurityController::class, 'adminUpdatePassword'])->middleware('role');
