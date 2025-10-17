@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-5">
    <img class="w-100 rounded" src="{{ asset('storage/'.$p->image ?? 'placeholder.jpg') }}">
  </div>
  <div class="col-md-7">
    <h3>{{ $p->name }} <small class="text-muted">{{ $p->code }}</small></h3>
    <div class="fs-4 mb-2">
      @if($p->sale_price)<span class="strike me-2">{{ number_format($p->price) }} đ</span>@endif
      <span class="price">{{ number_format($p->display_price) }} đ</span>
    </div>
    <p>{{ $p->description }}</p>
    <form method="POST" action="{{ route('cart.add',$p) }}">@csrf
      <div class="input-group" style="max-width:240px">
        <input type="number" name="qty" value="1" min="1" class="form-control">
        <button class="btn btn-success">🛒 Thêm giỏ hàng</button>
      </div>
    </form>
  </div>
</div>
@endsection
