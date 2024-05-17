<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawController;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("auth")->group(function () {
    Route::resource("/categories", CategoryController::class);
    Route::resource("/products", ProductController::class);
    Route::resource("/sales", SaleController::class);
    Route::resource("/withdraws", WithdrawController::class);
    Route::resource("/settings", SettingController::class);
    Route::resource("/users", UserController::class);
    Route::resource("/admins", AdminController::class);
});