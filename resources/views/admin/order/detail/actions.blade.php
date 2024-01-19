@canany(['orders-editProduct', 'orders-deleteProduct'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('orders.product.destroy',$row->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('orders-editProduct')
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editProduct{{ $row->id }}">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('orders-deleteProduct')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany