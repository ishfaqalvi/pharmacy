@extends('admin.layout.app')

@section('title')
    Brand
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Brand Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <button class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill me-2 collapsed" data-bs-toggle="collapse" data-bs-target="#filters" aria-expanded="true">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-funnel"></i>
                </span>
                Filter
            </button>
            @can('brands-create')
            <a href="{{ route('brands.all.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
            @endcan
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-sm-12">
    <div class="card collapse {{ !is_null($userRequest) ? 'show' : ''}}" id="filters">
        <div class="card-body">
            <form action="{{route('brands.all.filter')}}" method="post">
                @csrf
                @include('admin.brand.filter')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Brand</h5>
        </div>
        <table class="table">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    <th>Logo</th>
					<th>Name</th>
					<th>Website</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ ++$i }}</td>
					<td><img src="{{ $brand->logo }}" height="40px"></td>
					<td>{{ $brand->name }}</td>
					<td>{{ $brand->website }}</td>
                    <td class="text-center">@include('admin.brand.actions')</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-body">
            {{ $brands->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        $(".select").select2();
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