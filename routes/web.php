<?php
//() {} []

use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*Frontend Routes*/

// view the first page
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');



/*Admin Panel Routes*/

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

// Home Advertisement Page Show
Route::get('/admin/home-advertisement',[AdminAdvertisementController::class,'home_ad_show'])->name('admin_home_ad_show')->middleware('admin:admin');

// Home Advertisement submit
Route::post('/admin/home-advertisement-update',[AdminAdvertisementController::class,'home_advertisement_update'])->name('home_advertisement_update');

// Top Advertisement Page Show
Route::get('/admin/top-advertisement',[AdminAdvertisementController::class,'top_ad_show'])->name('admin_top_ad_show')->middleware('admin:admin');

// Top Advertisement Submit
Route::post('/admin/top-advertisement-update',[AdminAdvertisementController::class,'top_advertisement_update'])->name('top_advertisement_update');

// Sidebar Advertisement Page Show
Route::get('/admin/sidebar-advertisement',[AdminAdvertisementController::class,'sidebar_ad_show'])->name('admin_sidebar_ad_show')->middleware('admin:admin');

// Sidebar Advertisement Create Page Show
Route::get('/admin/sidebar-advertisement-create',[AdminAdvertisementController::class,'sidebar_ad_create'])->name('admin_sidebar_ad_create')->middleware('admin:admin');

// Sidebar Advertisement Submit/Store
Route::post('/admin/sidebar-advertisement-submit',[AdminAdvertisementController::class,'sidebar_ad_store'])->name('admin_sidebar_ad_store');

// Sidebar Advertisement Edit Page Show
Route::get('/admin/sidebar-advertisement-edit/{id}',[AdminAdvertisementController::class,'sidebar_ad_edit'])->name('admin_sidebar_ad_edit')->middleware('admin:admin');

// Sidebar Advertisement Update
Route::post('/admin/sidebar-advertisement-update/{id}',[AdminAdvertisementController::class,'sidebar_ad_update'])->name('admin_sidebar_ad_update');

// Sidebar Advertisement Data Delete
Route::get('/admin/sidebar-advertisement-delete/{id}',[AdminAdvertisementController::class,'sidebar_ad_delete'])->name('admin_sidebar_ad_delete');

/* Category Routes */

// Show Category Page
Route::get('/admin/category/show',[AdminCategoryController::class,'show'])->name('admin_category_show')->middleware('admin:admin');

// Create Category Page
Route::get('/admin/category/create',[AdminCategoryController::class,'create'])->name('admin_category_create')->middleware('admin:admin');

// Category Submit/Store
Route::post('/admin/category/store',[AdminCategoryController::class,'store'])->name('admin_category_store');