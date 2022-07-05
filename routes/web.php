<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\GarbageBlogController;

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

/*===== USER =====*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/', [HomeController::class, 'regisNotification']);
Route::get('/join', [AdminController::class, 'join'])->name('join');
Route::post('/checkLogin', [AdminController::class, 'checkLogin'])->name('checkLogin');
Route::post('/checkRegister', [AdminController::class, 'checkRegister'])->name('checkRegister');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/registation-recover', [AdminController::class, 'regisRecover'])->name('regisRecover');
Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot-password', [AdminController::class, 'checkToken']);
Route::get('/recover-password', [AdminController::class, 'recoverPassword']);
Route::post('/recover-password', [AdminController::class, 'updateNewPassword']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'postMessage']);
Route::group(['prefix' => 'image'], function () {
    Route::get('/', [HomeController::class, 'image'])->name('image');
    Route::get('/upload', [HomeController::class, 'uploadImage'])->name('uploadImage');
    Route::post('/upload', [HomeController::class, 'postImage']);
});
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [HomeController::class, 'blog'])->name('blog');
    Route::get('/up', [HomeController::class, 'upBlog'])->name('upBlog');
    Route::post('/up', [HomeController::class, 'postBlog']);
    Route::get('view/{id}', [HomeController::class, 'viewBlog']);
    Route::post('view/comment', [HomeController::class, 'allComment'])->name('allComment');
    Route::post('view/comment/send', [HomeController::class, 'sendComment'])->name('sendComment');
    Route::get('/search', [HomeController::class, 'searchBlog'])->name('searchBlog');
});
Route::group(['prefix' => 'project'], function () {
    Route::get('/', [HomeController::class, 'project'])->name('project');
    Route::get('view/{id}', [HomeController::class, 'viewProject']);
    Route::get('/search', [HomeController::class, 'searchProject'])->name('searchProject');
});
Route::group(['prefix' => 'donate'], function () {
    Route::get('/', [HomeController::class, 'donate'])->name('donate');
    Route::post('/website', [HomeController::class, 'donateWebsite'])->name('donateWebsite');
    Route::post('/confirm-payment', [HomeController::class, 'confirmPayment'])->name('confirmPayment');
    Route::get('/project/{id}', [HomeController::class, 'donateProject']);
    Route::post('/project/{id}', [HomeController::class, 'createPaymentProject']);
    Route::post('/confirm-payment/{id}', [HomeController::class, 'confirmPaymentProject']);

});
Route::group(['prefix' => 'event'], function () {
    Route::get('/', [HomeController::class, 'event'])->name('event');
    Route::get('/view/{id}', [HomeController::class, 'viewEvent']);
    Route::get('/join/{id}', [HomeController::class, 'joinEvent']);
    Route::get('/quit/{id}', [HomeController::class, 'quitEvent']);
    Route::get('/search', [HomeController::class, 'searchEvent'])->name('searchEvent');
});
Route::group(['prefix' => 'profile'], function() {
    Route::get('', [HomeController::class, 'profile'])->name('myProfile');
    Route::post('/save', [HomeController::class, 'saveProfile'])->name('saveProfile');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-avatar', [HomeController::class, 'changeAvatar'])->name('changeAvatar');
    Route::get('/my-event', [HomeController::class, 'myEvent'])->name('myEvent');
    Route::get('/my-blog', [HomeController::class, 'myBlog'])->name('myBlog');
    Route::get('/my-blog/edit/{id}', [HomeController::class, 'editMyBlog']);
    Route::post('/my-blog/edit/{id}', [HomeController::class, 'changeMyBlog']);
    Route::get('/my-blog/delete/{id}', [HomeController::class, 'deleteMyBlog']);
    Route::get('/my-image', [HomeController::class, 'myImage'])->name('myImage');
    Route::get('/my-image/edit/{id}', [HomeController::class, 'editMyImage']);
    Route::post('/my-image/edit/{id}', [HomeController::class, 'changeMyImage']);
    Route::get('/my-image/delete/{id}', [HomeController::class, 'deleteMyImage']);
});


/*===== ADMIN =====*/

Route::group(['prefix' => 'admin'], function() {
    // Mainly
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('user-filter', [AdminController::class, 'userFilter'])->name('userFilter');
        Route::post('element-donut', [AdminController::class, 'elementDonut'])->name('elementDonut');
    });
    // Role
    Route::group(['prefix' => 'role'], function () {
        Route::get('grant', [RoleController::class, 'grant'])->name('grantRole');
        Route::post('grant', [RoleController::class, 'grantRole']);
        Route::get('allow', [RoleController::class, 'allowRole'])->name('allowRole');
        Route::get('allow/{id}', [RoleController::class, 'allowSU']);
        Route::get('remove', [RoleController::class, 'removeRole'])->name('removeRole');
        Route::get('remove/{id}', [RoleController::class, 'removeSU']);
    });
    // User
    Route::group(['prefix' => 'user'], function () {
        Route::get('search-info', [RoleController::class, 'searchInfo'])->name('searchInfo');
        Route::get('search-info/search', [RoleController::class, 'searchUserInfo'])->name('searchUserInfo');
        Route::get('notification', [AdminController::class, 'notification'])->name('notification');
        Route::get('notification/send-all', [AdminController::class, 'sendNotificationAll'])->name('sendNotificationAll');
        Route::post('notification/send-all', [AdminController::class, 'postNotificationAll'])->name('sendNotificationAll');
        Route::get('notification/send-private/{id}', [AdminController::class, 'sendNotificationPrivate']);
        Route::post('notification/send-private/{id}', [AdminController::class, 'postNotificationPrivate']);
        Route::get('view-mess', [AdminController::class, 'viewMess'])->name('viewMess');
    });
    // Slider
    Route::group(['prefix' => 'slider'], function (){
        Route::get('add', [SliderController::class, 'addSlider'])->name('addSlider');
        Route::post('add', [SliderController::class, 'postSlider']);
        Route::get('manage', [SliderController::class, 'manageSlider'])->name('manageSlider');
        Route::get('delete/{id}', [SliderController::class, 'deleteSlider']);
        Route::get('edit/{id}', [SliderController::class, 'editSlider']);
        Route::post('edit/{id}', [SliderController::class, 'changeSlider']);
        Route::get('browse', [SliderController::class, 'browseSlider'])->name('browseSlider');
        Route::get('allow/{id}', [SliderController::class, 'allowSlider']);
    });
    // Hình ảnh
    Route::group(['prefix' => 'image'], function (){
        Route::get('add', [ImageController::class, 'addImage'])->name('addImage');
        Route::post('add', [ImageController::class, 'postImage']);
        Route::get('manage', [ImageController::class, 'manageImage'])->name('manageImage');
        Route::get('delete/{id}', [ImageController::class, 'deleteImage']);
        Route::get('edit/{id}', [ImageController::class, 'editImage']);
        Route::post('edit/{id}', [ImageController::class, 'changeImage']);
        Route::get('browse', [ImageController::class, 'browseImage'])->name('browseImage');
        Route::get('allow/{id}', [ImageController::class, 'allowImage']);
    });

    // Sự kiện
    Route::group(['prefix' => 'event'], function (){
        Route::get('add', [EventController::class, 'addEvent'])->name('addEvent');
        Route::post('add', [EventController::class, 'postEvent']);
        Route::get('manage', [EventController::class, 'manageEvent'])->name('manageEvent');
        Route::get('delete/{id}', [EventController::class, 'deleteEvent']);
        Route::get('edit/{id}', [EventController::class, 'editEvent']);
        Route::post('edit/{id}', [EventController::class, 'changeEvent']);
        Route::get('browse', [EventController::class, 'browseEvent'])->name('browseEvent');
        Route::get('allow/{id}', [EventController::class, 'allowEvent']);
    });

    // Bài viết
    Route::group(['prefix' => 'blog'], function (){
        Route::get('add', [BlogController::class, 'addBlog'])->name('addBlog');
        Route::post('add', [BlogController::class, 'postBlog']);
        Route::get('manage', [BlogController::class, 'manageBlog'])->name('manageBlog');
        Route::get('delete/{id}', [BlogController::class, 'deleteBlog']);
        Route::get('edit/{id}', [BlogController::class, 'editBlog']);
        Route::post('edit/{id}', [BlogController::class, 'changeBlog']);
        Route::get('browse', [BlogController::class, 'browseBlog'])->name('browseBlog');
        Route::get('allow/{id}', [BlogController::class, 'allowBlog']);
        Route::get('preview/{id}', [BlogController::class, 'previewBlog']);
    });



    // Dự án
    Route::group(['prefix' => 'project'], function (){
        Route::get('add', [ProjectController::class, 'addProject'])->name('addProject');
        Route::post('add', [ProjectController::class, 'postProject']);
        Route::get('manage', [ProjectController::class, 'manageProject'])->name('manageProject');
        Route::get('delete/{id}', [ProjectController::class, 'deleteProject']);
        Route::get('edit/{id}', [ProjectController::class, 'editProject']);
        Route::post('edit/{id}', [ProjectController::class, 'changeProject']);
        Route::get('browse', [ProjectController::class, 'browseProject'])->name('browseProject');
        Route::get('allow/{id}', [ProjectController::class, 'allowProject']);
    });

    // Profile
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/{id}', [AdminController::class, 'profile']);
        Route::post('save-profile/{id}', [AdminController::class, 'saveProfile']);
        Route::post('change-password/{id}', [AdminController::class, 'changePassword']);
        Route::post('avatar/change/{id}', [AdminController::class, 'uploadAvatar']);
    });
});