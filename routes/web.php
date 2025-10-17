<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Ở đây bạn định nghĩa tất cả các route chính của website bán hoa / thương mại điện tử
| Khi user truy cập các URL này, Laravel sẽ gọi đến các Controller tương ứng.
|--------------------------------------------------------------------------
*/

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Trang danh mục sản phẩm
Route::get('/danh-muc/{slug}', [ProductController::class, 'byCategory'])->name('category');

// Trang chi tiết sản phẩm
Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('product.show');

// ✅ Giỏ hàng
Route::middleware(['auth'])->group(function () {

    // Hiển thị giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Thêm sản phẩm vào giỏ hàng
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

    // Cập nhật số lượng
    Route::post('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');

    // Xóa sản phẩm khỏi giỏ hàng
    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
});

// ✅ Dashboard (trang sau đăng nhập)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Quản lý hồ sơ cá nhân
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Import route đăng ký/đăng nhập (do Laravel Breeze cung cấp)
require __DIR__.'/auth.php';
