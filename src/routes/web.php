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

Route::get("/admin/blogs", [AdminBlogController::class, 'index'])->name('admin.blogs');
Route::get("/admin/blogs/create", [AdminBlogController::class, 'create'])->name('admin.create');
Route::get('edit/{id}', [AdminBlogController::class, 'edit'])->name('admin.edit');
Route::put('/admin/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin..blogs.update');

Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin..users.create');

