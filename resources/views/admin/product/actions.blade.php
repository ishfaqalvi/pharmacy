@canany(['products-view', 'products-edit', 'products-delete','products-priceList' ,'products-priceList','products-imageList'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('products-priceList')
                    <a href="{{ route('products.prices.index',$product->id) }}" class="dropdown-item">
                        <i class="ph-currency-circle-dollar me-2"></i>{{ __('Prices') }}
                    </a>
                @endcan
                @can('products-imageList')
                    <a href="{{ route('products.images.index',$product->id) }}" class="dropdown-item">
                        <i class="ph-file-image me-2"></i>{{ __('Images') }}
                    </a>
                @endcan
                @can('products-view')
                    <a href="{{ route('products.all.show',$product->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('products-edit')
                    <a href="{{ route('products.all.edit',$product->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('products-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany