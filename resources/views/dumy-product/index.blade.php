@extends('admin.layout.app')

@section('title')
    Dumy Product
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Dumy Product Managment</span>
        </h4>
    </div>
    @can('dumy-products-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('dumy-products.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
        </div>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Dumy Product</h5>
        </div>
        <table class="table datatable-basic">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    
										<th>Brand Id</th>
										<th>Category Id</th>
										<th>Sub Category Id</th>
										<th>Name</th>
										<th>Composition Id</th>
										<th>Description</th>
										<th>Firebasepath</th>
										<th>Thumbnail</th>
										<th>Quantity</th>
										<th>Rating</th>
										<th>In Stock</th>
										<th>Download</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($dumyProducts as $key => $dumyProduct)
                <tr>
                    <td>{{ ++$key }}</td>
                    
											<td>{{ $dumyProduct->brand_id }}</td>
											<td>{{ $dumyProduct->category_id }}</td>
											<td>{{ $dumyProduct->sub_category_id }}</td>
											<td>{{ $dumyProduct->name }}</td>
											<td>{{ $dumyProduct->composition_id }}</td>
											<td>{{ $dumyProduct->description }}</td>
											<td>{{ $dumyProduct->firebasepath }}</td>
											<td>{{ $dumyProduct->thumbnail }}</td>
											<td>{{ $dumyProduct->quantity }}</td>
											<td>{{ $dumyProduct->rating }}</td>
											<td>{{ $dumyProduct->in_stock }}</td>
											<td>{{ $dumyProduct->download }}</td>

                    <td class="text-center">@include('admin.dumy-product.actions')</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@canany(['dumy-products-view', 'dumy-products-edit', 'dumy-products-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('dumy-products.destroy',$dumyProduct->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('dumy-products-view')
                    <a href="{{ route('dumy-products.show',$dumyProduct->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('dumy-products-edit')
                    <a href="{{ route('dumy-products.edit',$dumyProduct->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('dumy-products-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
@section('script')
<script>
    $(function () {
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection