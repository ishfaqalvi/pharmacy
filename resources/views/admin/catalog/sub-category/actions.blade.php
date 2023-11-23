@canany(['subCategories-view', 'subCategories-edit', 'subCategories-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('sub-categories.destroy',$subCategory->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('subCategories-view')
                    <a href="{{ route('sub-categories.show',$subCategory->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('subCategories-edit')
                    <a href="{{ route('sub-categories.edit',$subCategory->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('subCategories-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany