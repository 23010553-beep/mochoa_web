@extends('layouts.master')
@section('content')
<h4>Giỏ hàng</h4>
@if($cart->items->isEmpty())
  <div class="alert alert-info">Giỏ hàng trống.</div>
@else
<table class="table align-middle">
  <thead><tr><th>Sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Tạm tính</th><th></th></tr></thead>
  <tbody>
  @foreach($cart->items as $it)
    <tr>
      <td>{{ $it->product->name }}</td>
      <td>{{ number_format($it->price) }} đ</td>
      <td>
        <form class="d-flex" method="POST" action="{{ route('cart.update',$it) }}">@csrf
          <input type="number" name="qty" value="{{ $it->qty }}" min="1" class="form-control me-2" style="width:90px">
          <button class="btn btn-outline-primary btn-sm">Cập nhật</button>
        </form>
      </td>
      <td>{{ number_format($it->price*$it->qty) }} đ</td>
      <td>
        <form method="POST" action="{{ route('cart.remove',$it) }}">@csrf @method('DELETE')
          <button class="btn btn-outline-danger btn-sm">Xóa</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
  <tfoot>
    <tr><th colspan="3" class="text-end">Tổng:</th><th class="fs-5">{{ number_format($cart->total()) }} đ</th><th></th></tr>
  </tfoot>
</table>
@endif
@endsection
