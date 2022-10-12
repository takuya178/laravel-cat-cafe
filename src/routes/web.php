<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminBlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/contact/complete', [ContactController::class, 'complete'])->name(name: 'contact.complete');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get("/blogs", [AdminBlogController::class, 'index'])->name('blogs')->middleware(('auth'));
        Route::get("/blogs/create", [AdminBlogController::class, 'create'])->name('.create');
        Route::get("/blogs", [AdminBlogController::class, 'store'])->name('stoere');
        Route::get('edit/{id}', [AdminBlogController::class, 'edit'])->name('edit');
        Route::put('/blogs/{blog}', [AdminBlogController::class, 'update'])->name('blogs.update');
        Route::put('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('destroy');
    });


Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin..users.create');

