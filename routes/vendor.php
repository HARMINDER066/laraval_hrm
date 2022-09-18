<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\UserController;
use App\Http\Controllers\vendor\auth\LoginController;
use App\Http\Controllers\vendor\AttendenceController;
use App\Http\Controllers\vendor\LeaveController;



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



Route::get('/leave/', [LeaveController::class, 'index'])->name('vendor.leave.index');
Route::get('/leaveadd/', [LeaveController::class, 'add'])->name('vendor.leaveadd');
Route::post('/leaveaddsubmit/', [LeaveController::class, 'store'])->name('vendor.leaveaddsubmit');
Route::get('leave_edit/{id}', [LeaveController::class, 'leave_edit'])->name('vendor.leave.edit_leave');
Route::post('leave_edit_save/{id}', [LeaveController::class, 'leave_edit_save'])->name('vendor.leave.editsave');
Route::post('leave_delete/{id}', [LeaveController::class, 'leave_delete'])->name('vendor.leave.delete');
Route::get('leave_status_change/{id}', [LeaveController::class, 'leave_status_change'])->name('vendor.leave.leave_status_change');
Route::post('leave_status_change/{id}', [LeaveController::class, 'leave_status_change'])->name('vendor.leave.leave_status_change');



});
});

