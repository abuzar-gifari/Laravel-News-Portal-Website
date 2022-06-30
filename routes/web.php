<?php
//() {} []

use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminFAQController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLiveChannelController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Author\AuthorHomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ArchiveController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FAQController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\PollController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\VideoController;
use Illuminate\Support\Facades\Route;


/* Author Routes */

Route::get('/author/home',[AuthorHomeController::class,'index'])->name('author_home');


/* Frontend Routes */


// home page
Route::get('/',[HomeController::class,'index'])->name('home');

// about page show
Route::get('/about',[AboutController::class,'index'])->name('about');

// contact route
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/contact/send-email',[ContactController::class,'send_email'])->name('contact_form_submit');

// terms and condition page show
Route::get('/terms-and-conditions',[TermsController::class,'index'])->name('terms');

// faq page show
Route::get('/faq',[FAQController::class,'index'])->name('faq');


/* Login Route for frontend */


Route::get('/login',[LoginController::class,'index'])->name('login');

Route::post('/login-submit',[LoginController::class,'login_submit'])->name('login_submit');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');





// photo and video gallery page show
Route::get('/photo-gallery',[PhotoController::class,'index'])->name('photo_gallery');
Route::get('/video-gallery',[VideoController::class,'index'])->name('video_gallery');

// news detail page show
Route::get('/news-detail/{id}',[PostController::class,'detail'])->name('news_detail');

// sub-category page show
Route::get('/category/{id}',[SubCategoryController::class,'index'])->name('category');

// subscriber route
Route::post('/subscriber',[SubscriberController::class,'index'])->name('subscribe');
Route::get('/subscriber/verify/{token}/{email}',[SubscriberController::class,'verify'])->name('subscriber_verify');

// poll route
Route::post('/poll/submit',[PollController::class,'submit'])->name('poll_submit');
Route::get('/poll/previous',[PollController::class,'previous_poll_result'])->name('previous_poll');

// archive route
Route::post('/archive/show',[ArchiveController::class,'show'])->name('archive_show');
Route::get('/archive/{year}/{month}',[ArchiveController::class,'detail'])->name('archive_detail');

// search result route
Route::get('/subcategory-by-category/{id}',[HomeController::class,'get_subcategory_by_category'])->name('subcategory-by-category');
Route::post('/search/result',[HomeController::class,'search'])->name('search_result');

// tag route
Route::get('/tag/{tag_name}',[TagController::class,'show'])->name('tag_show');





/* Admin Panel Routes */



// view dashboard page
Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');// middleware name: guard name


/* Authentication Routes */

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



/* Advertisement Routes */

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



/* Sub Category Routes */

// Show Sub Category Page
Route::get('/admin/sub-category/show',[AdminSubCategoryController::class,'show'])->name('admin_sub_category_show')->middleware('admin:admin');

// Create Sub Category Page
Route::get('/admin/sub-category/create',[AdminSubCategoryController::class,'create'])->name('admin_sub_category_create')->middleware('admin:admin');

// Sub Category Submit/Store
Route::post('/admin/sub-category/store',[AdminSubCategoryController::class,'store'])->name('admin_sub_category_store');

// Sub Category Edit Page Show
Route::get('/admin/sub-category/edit/{id}',[AdminSubCategoryController::class,'edit'])->name('admin_sub_category_edit')->middleware('admin:admin');

// Sub Category Update
Route::post('/admin/sub-category-update/{id}',[AdminSubCategoryController::class,'update'])->name('admin_sub_category_update');

// Sub Category Data Delete
Route::get('/admin/sub-category-delete/{id}',[AdminSubCategoryController::class,'delete'])->name('admin_sub_category_delete');



/* Post Routes */

// Show Post Page
Route::get('/admin/post/show',[AdminPostController::class,'show'])->name('admin_post_show')->middleware('admin:admin');

// Create Post Page
Route::get('/admin/post/create',[AdminPostController::class,'create'])->name('admin_post_create')->middleware('admin:admin');

// Post Submit/Store
Route::post('/admin/post/store',[AdminPostController::class,'store'])->name('admin_post_store');

// Post Edit Page Show
Route::get('/admin/post/edit/{id}',[AdminPostController::class,'edit'])->name('admin_post_edit')->middleware('admin:admin');

// Post Update
Route::post('/admin/post-update/{id}',[AdminPostController::class,'update'])->name('admin_post_update');

// Post Data Delete
Route::get('/admin/post-delete/{id}',[AdminPostController::class,'delete'])->name('admin_post_delete');

// Tag Delete
Route::get('/admin/post/tag/delete/{id}/{post_id}',[AdminPostController::class,'delete_tag'])->name('admin_post_tag_delete')->middleware('admin:admin');


/* Setting Routes */

// Show Setting Page
Route::get('/admin/setting',[AdminSettingController::class,'index'])->name('admin_setting')->middleware('admin:admin');

// Setting Update
Route::post('/admin/setting-update',[AdminSettingController::class,'update'])->name('admin_setting_update');



/* Photo Routes */

// Show Photo Page
Route::get('/admin/photo/show',[AdminPhotoController::class,'show'])->name('admin_photo_show')->middleware('admin:admin');

// Create Photo Page
Route::get('/admin/photo/create',[AdminPhotoController::class,'create'])->name('admin_photo_create')->middleware('admin:admin');

// Photo Submit/Store
Route::post('/admin/photo/store',[AdminPhotoController::class,'store'])->name('admin_photo_store');

// Photo Edit Page Show
Route::get('/admin/photo/edit/{id}',[AdminPhotoController::class,'edit'])->name('admin_photo_edit')->middleware('admin:admin');

// Photo Update
Route::post('/admin/photo/update/{id}',[AdminPhotoController::class,'update'])->name('admin_photo_update');

// Photo Data Delete
Route::get('/admin/photo/delete/{id}',[AdminPhotoController::class,'delete'])->name('admin_photo_delete');


/* Video Routes */

// Show Video Page
Route::get('/admin/video/show',[AdminVideoController::class,'show'])->name('admin_video_show')->middleware('admin:admin');

// Create Video Page
Route::get('/admin/video/create',[AdminVideoController::class,'create'])->name('admin_video_create')->middleware('admin:admin');

// Video Submit/Store
Route::post('/admin/video/store',[AdminVideoController::class,'store'])->name('admin_video_store');

// Video Edit Page Show
Route::get('/admin/video/edit/{id}',[AdminVideoController::class,'edit'])->name('admin_video_edit')->middleware('admin:admin');

// Video Update
Route::post('/admin/video/update/{id}',[AdminVideoController::class,'update'])->name('admin_video_update');

// Video Data Delete
Route::get('/admin/video/delete/{id}',[AdminVideoController::class,'delete'])->name('admin_video_delete');


/* About Page Routes */
// about page show
Route::get('/admin/page/about',[AdminPageController::class,'about'])->name('admin_page_about')->middleware('admin:admin');

// about page Update
Route::post('/admin/page/about/update',[AdminPageController::class,'about_update'])->name('admin_page_about_update');


/* FAQ Page Routes */
// FAQ page show
Route::get('/admin/page/faq',[AdminPageController::class,'faq'])->name('admin_page_faq')->middleware('admin:admin');

// FAQ page Update
Route::post('/admin/page/faq/update',[AdminPageController::class,'faq_update'])->name('admin_page_faq_update');


/* Terms and Conditions Page Routes */
// Terms and Conditions page show
Route::get('/admin/page/terms',[AdminPageController::class,'terms'])->name('admin_page_terms')->middleware('admin:admin');

// Terms and Conditions page Update
Route::post('/admin/page/terms/update',[AdminPageController::class,'terms_update'])->name('admin_page_terms_update');


/* Frontend Login Routes */
// Login page show
Route::get('/admin/page/login',[AdminPageController::class,'login'])->name('admin_page_login')->middleware('admin:admin');

// Login page Update
Route::post('/admin/page/login/update',[AdminPageController::class,'login_update'])->name('admin_page_login_update');


/* Contact Page Routes */
// Contact page show
Route::get('/admin/page/contact',[AdminPageController::class,'contact'])->name('admin_page_contact')->middleware('admin:admin');

// Contact page Update
Route::post('/admin/page/contact/update',[AdminPageController::class,'contact_update'])->name('admin_page_contact_update');



/* FAQ Routes */

// Show FAQ Page
Route::get('/admin/faq/show',[AdminFAQController::class,'show'])->name('admin_faq_show')->middleware('admin:admin');

// Create FAQ Page
Route::get('/admin/faq/create',[AdminFAQController::class,'create'])->name('admin_faq_create')->middleware('admin:admin');

// FAQ Submit/Store
Route::post('/admin/faq/store',[AdminFAQController::class,'store'])->name('admin_faq_store');

// FAQ Edit Page Show
Route::get('/admin/faq/edit/{id}',[AdminFAQController::class,'edit'])->name('admin_faq_edit')->middleware('admin:admin');

// FAQ Update
Route::post('/admin/faq/update/{id}',[AdminFAQController::class,'update'])->name('admin_faq_update');

// FAQ Data Delete
Route::get('/admin/faq/delete/{id}',[AdminFAQController::class,'delete'])->name('admin_faq_delete');


/* subscriber */
Route::get('/admin/subscriber/all',[AdminSubscriberController::class,'show_all'])->name('admin_subscriber')->middleware('admin:admin');

Route::get('/admin/subscriber/send-email',[AdminSubscriberController::class,'send_email'])->name('admin_subscriber_send_email')->middleware('admin:admin');

Route::post('/admin/subscriber/send-email-submit',[AdminSubscriberController::class,'send_email_submit'])->name('admin_subscriber_send_email_submit');



/* Live Channel Routes */

// Show Live Channel Page
Route::get('/admin/live-channel/show',[AdminLiveChannelController::class,'show'])->name('admin_live_channel_show')->middleware('admin:admin');

// Create Live Channel Page
Route::get('/admin/live-channel/create',[AdminLiveChannelController::class,'create'])->name('admin_live_channel_create')->middleware('admin:admin');

// Live Channel Submit/Store
Route::post('/admin/live-channel/store',[AdminLiveChannelController::class,'store'])->name('admin_live_channel_store');

// Live Channel Edit Page Show
Route::get('/admin/live-channel/edit/{id}',[AdminLiveChannelController::class,'edit'])->name('admin_live_channel_edit')->middleware('admin:admin');

// Live Channel Update
Route::post('/admin/live-channel/update/{id}',[AdminLiveChannelController::class,'update'])->name('admin_live_channel_update');

// Live Channel Data Delete
Route::get('/admin/live-channel/delete/{id}',[AdminLiveChannelController::class,'delete'])->name('admin_live_channel_delete');



/* Online Poll Routes */

// Show Online Poll Page
Route::get('/admin/online-poll/show',[AdminOnlinePollController::class,'show'])->name('admin_online_poll_show')->middleware('admin:admin');

// Create Online Poll Page
Route::get('/admin/online-poll/create',[AdminOnlinePollController::class,'create'])->name('admin_online_poll_create')->middleware('admin:admin');

// Online Poll Submit/Store
Route::post('/admin/online-poll/store',[AdminOnlinePollController::class,'store'])->name('admin_online_poll_store');

// Online Poll Edit Page Show
Route::get('/admin/online-poll/edit/{id}',[AdminOnlinePollController::class,'edit'])->name('admin_online_poll_edit')->middleware('admin:admin');

// Online Poll Update
Route::post('/admin/online-poll/update/{id}',[AdminOnlinePollController::class,'update'])->name('admin_online_poll_update');

// Online Poll Data Delete
Route::get('/admin/online-poll/delete/{id}',[AdminOnlinePollController::class,'delete'])->name('admin_online_poll_delete');



/* Author Routes */

// Show author Page
Route::get('/admin/author/show',[AdminAuthorController::class,'show'])->name('admin_author_show')->middleware('admin:admin');

// Create author Page
Route::get('/admin/author/create',[AdminAuthorController::class,'create'])->name('admin_author_create')->middleware('admin:admin');

// author Submit/Store
Route::post('/admin/author/store',[AdminAuthorController::class,'store'])->name('admin_author_store');

// author Edit Page Show
Route::get('/admin/author/edit/{id}',[AdminAuthorController::class,'edit'])->name('admin_author_edit')->middleware('admin:admin');

// author Update
Route::post('/admin/author/update/{id}',[AdminAuthorController::class,'update'])->name('admin_author_update');

// author Data Delete
Route::get('/admin/author/delete/{id}',[AdminAuthorController::class,'delete'])->name('admin_author_delete');