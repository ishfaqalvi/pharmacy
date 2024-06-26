@canany(['orders-view', 'orders-edit', 'orders-actions', 'orders-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('orders-view')
                    <a href="{{ route('orders.show',$order->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @if($order->status == 'Pending')
                @can('orders-edit')
                    <a href="{{ route('orders.edit',$order->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @endif
                @can('orders-actions')
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderAction{{ $order->id }}">
                        <i class="ph-check-square me-2"></i>{{ __('Action') }}
                    </a>
                @endcan
                @can('orders-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany