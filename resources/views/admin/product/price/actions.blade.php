@canany(['products-priceEdit', 'products-priceDelete'])
<div class="d-inline-flex">
    <form action="{{ route('products.prices.destroy',$price->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('products-priceEdit')
            <button type="button" class="btn btn-link text-primary editRecord"
                data-id="{{ $price->id }}"
                data-title="{{ $price->title }}"
                data-price="{{ $price->price }}"
                data-discount="{{ $price->discount }}"
                data-default="{{ $price->default }}"
                >
                <i class="ph-pen"></i>
            </button>
        @endcan
        @can('products-priceDelete')
            <a href="#" class="text-danger sa-confirm mx-2">
                <i class="ph-trash"></i>
            </a>
        @endcan
    </form>
</div>
@endcanany