<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        if (!auth()->check()) return redirect()->route('login');

        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $cart->load('items.product');

        return view('cart', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ
    public function add(Product $product): RedirectResponse
    {
        if (!auth()->check()) return redirect()->route('login');

        $qty = max(1, (int) request('qty', 1));

        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        $item = $cart->items()->firstOrNew(['product_id' => $product->id]);
        $item->qty   = ($item->exists ? $item->qty : 0) + $qty;
        $item->price = $product->sale_price ?? $product->price; // chốt giá
        $item->save();

        return back()->with('ok', 'Đã thêm vào giỏ!');
    }

    // Cập nhật số lượng
    public function update(CartItem $item): RedirectResponse
    {
        if (!auth()->check()) return redirect()->route('login');
        if ($item->cart->user_id !== auth()->id()) abort(403);

        $item->update([
            'qty' => max(1, (int) request('qty', 1)),
        ]);

        return back();
    }

    // Xóa khỏi giỏ
    public function remove(CartItem $item): RedirectResponse
    {
        if (!auth()->check()) return redirect()->route('login');
        if ($item->cart->user_id !== auth()->id()) abort(403);

        $item->delete();

        return back();
    }
}
