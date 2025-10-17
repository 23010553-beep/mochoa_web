<div class="card product-card h-100">
    {{-- Ảnh sản phẩm --}}
    <img
        src="{{ $p->image ? asset('storage/'.$p->image) : asset('images/placeholder.jpg') }}"
        alt="{{ $p->name }}"
        style="width:100%;height:250px;object-fit:cover;"
    >

    <div class="card-body">
        <a class="stretched-link text-decoration-none fw-semibold"
           href="{{ route('product.show', $p->id) }}">{{ $p->name }}</a>

        <div class="mt-1">
            @if($p->sale_price)
                <span class="text-muted text-decoration-line-through me-2">
                    {{ number_format($p->price) }} đ
                </span>
            @endif
            <span class="price fw-bold">
                {{ number_format($p->display_price ?? ($p->sale_price ?? $p->price)) }} đ
            </span>
        </div>
    </div>
</div>
