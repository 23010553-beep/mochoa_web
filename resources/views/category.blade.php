@extends('layouts.master')
@section('content')
<h4>{{ $cat->name }}</h4>
<div class="d-flex justify-content-end mb-2">
  <form>
    <select name="sort" class="form-select" onchange="this.form.submit()">
      <option value="">Giá: Mặc định</option>
      <option value="price_asc" {{ request('sort')=='price_asc'?'selected':'' }}>Giá: Thấp → Cao</option>
      <option value="price_desc" {{ request('sort')=='price_desc'?'selected':'' }}>Giá: Cao → Thấp</option>
    </select>
  </form>
</div>
<div class="row g-3">
  @foreach($products as $p)
  <div class="col-6 col-md-4">@include('partials.product_card',['p'=>$p])</div>
  @endforeach
</div>
<div class="mt-3">{{ $products->withQueryString()->links() }}</div>
@endsection
