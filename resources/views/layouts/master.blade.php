<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Mộc hoa - mang sắc đẹp đến cuộc sống</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .left-nav{min-width:220px}
    .price{font-weight:700}
    .strike{text-decoration:line-through; opacity:.6}
    .product-card img{height:240px; object-fit:cover}
    .hotline{position:fixed; left:20px; bottom:20px; z-index:999}
  </style>
</head>
<body>
<header class="border-bottom">
  <div class="container py-2 d-flex justify-content-between align-items-center">
    <a href="/" class="text-decoration-none fs-4 fw-bold text-success">🌸 Mộc Hoa</a>
    <form class="d-none d-md-flex" action="{{ route('home') }}">
      <input class="form-control" name="q" placeholder="Nhập tên / Mã sản phẩm...">
    </form>
    <div>
      @auth
        <a href="{{ route('cart.index') }}" class="btn btn-outline-primary me-2">🛒 Giỏ hàng</a>
        <form class="d-inline" method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-dark">Đăng xuất</button></form>
      @else
        <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Đăng nhập</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Đăng ký</a>
      @endauth
    </div>
  </div>
  <nav class="bg-light">
    <div class="container d-flex gap-3 py-2">
      @foreach(\App\Models\Category::all() as $c)
        <a class="text-decoration-none" href="{{ route('category',$c->slug) }}">{{ $c->name }}</a>
      @endforeach
    </div>
  </nav>
</header>

<main class="container my-4">@yield('content')</main>

<a class="btn btn-danger hotline" href="tel:0867169891">Gọi: 0867.169.891</a>
<footer class="bg-dark text-white mt-5 py-4">
  <div class="container small">© {{ date('Y') }} Mộc hoa — Hotline 0867.169.891</div>
</footer>
</body></html>
