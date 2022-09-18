<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\auth\AuthController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\AttendenceController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\LeaveController;


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


Route::get('/vendor/', [VendorController::class, 'index'])->name('admin.vendor.index');
Route::get('/vendoradd/', [VendorController::class, 'add'])->name('admin.vendoradd');
Route::post('/vendoraddsubmit/', [VendorController::class, 'store'])->name('admin.vendoraddsubmit');
Route::get('vendorstatus/active_inactive/', [VendorController::class, 'status_change'])->name('admin.vendor.active_inactive');
Route::get('vendor_edit/{id}', [VendorController::class, 'user_edit'])->name('admin.vendor.edit_vendor');
Route::post('vendor_edit_save/{id}', [VendorController::class, 'user_edit_save'])->name('admin.vendor.editsave');
Route::post('vendor_delete/{id}', [VendorController::class, 'user_delete'])->name('admin.vendor.delete');
Route::get('vendor_password_change/{id}', [VendorController::class, 'customer_changepassword'])->name('admin.vendor.customer_changepassword');
Route::post('vendor_password_change/{id}', [VendorController::class, 'customer_changepassword'])->name('admin.vendor.changepasswordstore');

Route::get('/settingadd/', [SettingController::class, 'add'])->name('admin.settingadd');
Route::post('/settingaddsubmit/', [SettingController::class, 'store'])->name('admin.settingaddsubmit');


Route::get('/leave/', [LeaveController::class, 'index'])->name('admin.leave.index');
Route::get('/all_leave/', [LeaveController::class, 'all_employee_leave'])->name('admin.leave.all_leave');
Route::get('/leaveadd/', [LeaveController::class, 'add'])->name('admin.leaveadd');
Route::post('/leaveaddsubmit/', [LeaveController::class, 'store'])->name('admin.leaveaddsubmit');
Route::get('leave_edit/{id}', [LeaveController::class, 'leave_edit'])->name('admin.leave.edit_leave');
Route::post('leave_edit_save/{id}', [LeaveController::class, 'leave_edit_save'])->name('admin.leave.editsave');
Route::post('leave_delete/{id}', [LeaveController::class, 'leave_delete'])->name('admin.leave.delete');
Route::get('leave_status_change/{id}', [LeaveController::class, 'leave_status_change'])->name('admin.leave.leave_status_change');
Route::post('leave_status_change/{id}', [LeaveController::class, 'leave_status_change'])->name('admin.leave.leave_status_change');


});
});

