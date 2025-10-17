<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Cart; // ✅ thêm dòng này

class AuthenticatedSessionController extends Controller
{
    /**
     * Hiển thị trang đăng nhập.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Xử lý đăng nhập.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Xác thực tài khoản
        $request->authenticate();

        // Tạo session
        $request->session()->regenerate();

        // ✅ Tự động tạo giỏ hàng cho user nếu chưa có
        Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        // Điều hướng sau đăng nhập
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Đăng xuất người dùng.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
