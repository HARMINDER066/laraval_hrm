<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\auth\AuthController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\AttendenceController;


Route::prefix('admin')->group(function() {
	        $redirect_admin = (App::environment('local')) ? 'admin/login' : '/';

Route::get('/login/', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/loginsubmit/', [AuthController::class, 'adminLogin'])->name('admin.loginsubmit');

        Route::group([ 'middleware' => 'assign.guard:admin,' . $redirect_admin], function() {

Route::get('/user/', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/useradd/', [UserController::class, 'add'])->name('admin.useradd');
Route::post('/useraddsubmit/', [UserController::class, 'store'])->name('admin.useraddsubmit');
Route::get('userstatus/active_inactive/', [UserController::class, 'status_change'])->name('admin.user.active_inactive');
Route::get('users_edit/{id}', [UserController::class, 'user_edit'])->name('admin.user.edit_user');
Route::post('users_edit_save/{id}', [UserController::class, 'user_edit_save'])->name('admin.users.editsave');
Route::post('users_delete/{id}', [UserController::class, 'user_delete'])->name('admin.users.delete');
Route::get('users_password_change/{id}', [UserController::class, 'customer_changepassword'])->name('admin.users.customer_changepassword');
Route::post('users_password_change/{id}', [UserController::class, 'customer_changepassword'])->name('admin.users.changepasswordstore');

Route::get('/package/', [PackageController::class, 'index'])->name('admin.package.index');
Route::get('/packageadd/', [PackageController::class, 'add'])->name('admin.packageadd');
Route::get('package_edit/{id}', [PackageController::class, 'package_edit'])->name('admin.package.edit_package');
Route::post('/packageaddsubmit/', [PackageController::class, 'store'])->name('admin.packageaddsubmit');
Route::post('upackage_edit_save/{id}', [PackageController::class, 'package_edit_save'])->name('admin.package.editsave');
Route::get('packagestatus/active_inactive/', [PackageController::class, 'status_change'])->name('admin.package.active_inactive');
Route::post('package_delete/{id}', [PackageController::class, 'package_delete'])->name('admin.package.delete');

Route::get('/attendence/', [AttendenceController::class, 'index'])->name('admin.attendence.index');
Route::get('/all_attendence/', [AttendenceController::class, 'all_employee_attendence'])->name('admin.attendence.all_attendence');
Route::get('user_attendence_edit/{id}', [AttendenceController::class, 'user_attendence_edit'])->name('admin.users.edit_attendence');
Route::post('user_attendence_edit/{id}', [AttendenceController::class, 'user_attendence_edit'])->name('admin.users.edit_attendence_store');
Route::post('attendence_delete/{id}', [AttendenceController::class, 'attendence_delete'])->name('admin.users.attendence_delete');



});
});

