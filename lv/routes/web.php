<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get("/", [PostController::class, "index"]);

// Hiển thị danh sách bài đăng
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Hiển thị form thêm bài đăng
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Lưu bài đăng mới
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Hiển thị form sửa bài đăng
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Cập nhật bài đăng
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Xóa bài đăng
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
