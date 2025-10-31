<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Mail\Mailables\Content;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', [UserController::class, 'index'])->name('user.create');
Route::post('/register', [UserController::class, 'register'])->name('user.store');
Route::get('/login', [UserController::class, 'loginform'])->name('user.login');
Route::post('/userlogin', [UserController::class, 'login'])->name('user.check');
Route::get('/dashboard', [UserController::class, 'admin'])->name('user.admin');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');





// Route::get('/home', function () {
//     return view('dashboard');
// })->name('user.index');



    Route::get('home', [HomeController::class, 'index'])->name('admin.home');
    //page Routes//

    Route::get('/page', [PageController::class, 'index'])->name('admin.pages');
    Route::get('/pages-data', [PageController::class, 'getData'])->name('admin.pages.data');
    Route::post('/pages/store', [PageController::class, 'store'])->name('admin.pages.store');
    Route::get('/pages/{id}/edit', [PageController::class, 'edit']);
    Route::put('/pages/{id}', [PageController::class, 'update'])->name('admin.pages.update');
    Route::delete('/pages/{id}', [PageController::class, 'destroy']);



    Route::get('/content', [ContentController::class, 'index'])->name('admin.pages.content');
    Route::get('/contents-data', [ContentController::class, 'getData'])->name('admin.content.data');
    Route::post('/contents-store', [ContentController::class, 'store'])->name('admin.content.store');
    Route::get('/contents/{id}/edit', [ContentController::class, 'edit'])->name('admin.content.edit');
    Route::put('contents/{id}', [ContentController::class, 'update']);
    Route::delete('/content/{id}', [ContentController::class, 'destroy']);



    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog');
    Route::get('/about', [AboutController::class, 'index'])->name('admin.about');
    Route::get('/cetegories', [ContactController::class, 'index'])->name('admin.cetegories');
    Route::get('/setting', [SettingController::class, 'index'])->name('admin.setting');




// Route::get('/', function () {
//     return view('site.home');
// })->name('home');
// Route::get('/', function () {
//     return view('site.pages.about');
// })->name('home');
// Route::get('/', function () {
//     return view('site.pages.contact');
// })->name('home');
// Route::get('/', function () {
//     return view('site.pages.blog');
// })->name('home');
// Route::get('/', function () {
//     return view('site.pages.portfolio');
// })->name('home');




// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });


