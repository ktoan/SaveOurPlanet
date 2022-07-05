<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APIServicesController;
use App\Http\Controllers\APIUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function() {
    Route::post("login", [APIAuthController::class, 'login']);
    Route::post("register", [APIAuthController::class, 'register']);
});

Route::group(['prefix' => 'user'], function() {
    Route::post("get", [APIUserController::class, 'get']);
    Route::post("update", [APIUserController::class, 'update']);
    Route::post("avatar", [APIUserController::class, 'avatar']);
    Route::post("wall", [APIUserController::class, 'wall']);
});

Route::post("home", [APIServicesController::class, "home"]);
Route::post("about", [APIServicesController::class, "about"]);
Route::group(['prefix' => 'blogs'], function () {
    Route::get("", [APIServicesController::class, "blogs"]);
    Route::post("edit", [APIServicesController::class, "editBlog"]);
    Route::post("editNoImage", [APIServicesController::class, "editBlogNoImage"]);
    Route::post("delete", [APIServicesController::class, "deleteBlog"]);
    Route::post("upload", [APIServicesController::class, "uploadBlog"]);
    Route::post("viewBlog", [APIServicesController::class, "viewBlog"]);
    Route::get("{id}", [APIServicesController::class, "viewBlogOnWeb"]);
    Route::post("comment", [APIServicesController::class, "comment"]);
    Route::post("comment/delete", [APIServicesController::class, "deleteComment"]);
    Route::post("comment/edit", [APIServicesController::class, "editComment"]);
});
Route::group(['prefix' => 'donations'], function() {
    Route::get("", [APIServicesController::class, 'donations']);
    Route::post("donate", [APIServicesController::class, 'confirmDonation']);
});
Route::group(['prefix' => 'projects'], function () {
    Route::get("", [APIServicesController::class, "projects"]);
    Route::post("viewProject", [APIServicesController::class, "viewProject"]);
    Route::get("{id}", [APIServicesController::class, "viewProjectOnWeb"]);
});
Route::group(['prefix' => "images"], function() {
    Route::get("", [APIServicesController::class, "images"]);
    Route::post("upload", [APIServicesController::class, "uploadImage"]);
    Route::post("delete", [APIServicesController::class, 'deleteImage']);
    Route::post("edit", [APIServicesController::class, 'editImage']);
});
Route::group(['prefix' => 'events'], function() {
    Route::post("", [APIServicesController::class, "events"]);
    Route::post("viewEvent", [APIServicesController::class, "viewEvent"]);
    Route::get("{id}", [APIServicesController::class, "viewEventOnWeb"]);
    Route::post("join", [APIServicesController::class, "joinEvent"]);
    Route::post("quit", [APIServicesController::class, "quitEvent"]);
});
Route::post("contact", [APIServicesController::class, "contact"]);