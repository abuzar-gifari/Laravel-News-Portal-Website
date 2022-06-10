<?php
//() {} []

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Admin Routes*/

// view dashboard page
Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');// middleware name: guard name

// admin login page show
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');

// admin login submit
Route::post('/admin/login-submit',[AdminLoginController::class,'admin_login_submit'])->name('admin_login_submit');

// admin logout
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');

// admin forget password page show
Route::get('/admin/forget-password',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');

// admin forget password submit
Route::post('/admin/admin-forget-password-submit',[AdminLoginController::class,'admin_forget_password_submit'])->name('admin_forget_password_submit');

// admin reset password page show
Route::get('admin/reset-password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name('admin_reset_password');

// admin reset password submit
Route::post('/admin/admin-reset-password-submit',[AdminLoginController::class,'admin_reset_password_submit'])->name('admin_reset_password_submit');

// admin edit profile page show
Route::get('/admin/edit-profile',[AdminProfileController::class,'admin_edit_profile'])->name('admin_edit_profile')->middleware('admin:admin');

// admin edit profile submit
Route::post('/admin/edit-profile-submit',[AdminProfileController::class,'edit_profile_submit'])->name('edit_profile_submit');
