<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\UserController;
use App\Http\Controllers\vendor\auth\LoginController;
use App\Http\Controllers\vendor\AttendenceController;



Route::prefix('vendor')->group(function() {
Route::get('/login/', [LoginController::class, 'showvendorLoginForm'])->name('vendor.login');
Route::post('/loginsubmit/', [LoginController::class, 'vendorLogin'])->name('vendor.loginsubmit');

	  $redirect_vendor = (App::environment('local')) ? 'vendor/login' : '/';
        Route::group([ 'middleware' => 'assign.guard:vendor,' . $redirect_vendor], function() {

Route::get('/user/', [UserController::class, 'index'])->name('vendor.user.index');
Route::get('/useradd/', [UserController::class, 'add'])->name('vendor.useradd');
Route::post('/useraddsubmit/', [UserController::class, 'store'])->name('vendor.useraddsubmit');
Route::get('userstatus/active_inactive/', [UserController::class, 'status_change'])->name('vendor.user.active_inactive');
Route::get('users_edit/{id}', [UserController::class, 'user_edit'])->name('vendor.user.edit_user');
Route::post('users_edit_save/{id}', [UserController::class, 'user_edit_save'])->name('vendor.users.editsave');
Route::post('users_delete/{id}', [UserController::class, 'user_delete'])->name('vendor.users.delete');
Route::get('users_password_change/{id}', [UserController::class, 'customer_changepassword'])->name('vendor.users.customer_changepassword');
Route::get('users_password_change/{id}', [UserController::class, 'customer_changepassword'])->name('vendor.users.customer_changepassword');
Route::post('users_password_change/{id}', [UserController::class, 'customer_changepassword'])->name('vendor.users.changepasswordstore');



Route::get('/attendence/', [AttendenceController::class, 'index'])->name('vendor.attendence.index');
Route::get('user_attendence_edit/{id}', [AttendenceController::class, 'user_attendence_edit'])->name('vendor.users.edit_attendence');
Route::post('user_attendence_edit/{id}', [AttendenceController::class, 'user_attendence_edit'])->name('vendor.users.edit_attendence_store');
Route::post('attendence_delete/{id}', [AttendenceController::class, 'attendence_delete'])->name('vendor.users.attendence_delete');




});
});

