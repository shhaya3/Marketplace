<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TemplateController as AdminTemplateController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// ── Public routes ──────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');

Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
Route::get('/templates/category/{slug}', [TemplateController::class, 'byCategory'])->name('templates.category');
Route::get('/templates/{slug}', [TemplateController::class, 'show'])->name('templates.show');
Route::get('/templates/{slug}/preview', [TemplateController::class, 'preview'])->name('templates.preview');

Route::post('/enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');

// ── Auth routes ─────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendReset'])->name('password.email');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ── Admin routes ─────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('templates', AdminTemplateController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('enquiries', [AdminEnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/{enquiry}', [AdminEnquiryController::class, 'show'])->name('enquiries.show');
    Route::patch('enquiries/{enquiry}', [AdminEnquiryController::class, 'update'])->name('enquiries.update');
});


