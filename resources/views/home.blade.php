@extends('layouts.master')
@section('content')
<div class="row">
  <aside class="col-lg-3 left-nav">
    <div class="list-group mb-3">
      <div class="list-group-item active">Danh mục sản phẩm</div>
      @foreach($categories as $c)
        <a class="list-group-item" href="{{ route('category',$c->slug) }}">{{ $c->name }}</a>
      @endforeach
    </div>
  </aside>
  <section class="col-lg-9">
    <h4 class="mb-3">Hoa mới</h4>
    <div class="row g-3">
      @foreach($products as $p)
      <div class="col-6 col-md-4">
        <div class="card product-card h-100">
          <img src="{{ asset('storage/'.$p->image ?? 'placeholder.jpg') }}" class="card-img-top" alt="">
          <div class="card-body">
            <a class="stretched-link text-decoration-none fw-semibold" href="{{ route('product.show',$p->id) }}">{{ $p->name }}</a>
            <div>
              @if($p->sale_price)
                <span class="strike me-2">{{ number_format($p->price) }} đ</span>
              @endif
              <span class="price">{{ number_format($p->display_price) }} đ</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
</div>
@endsection
