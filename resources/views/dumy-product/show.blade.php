@extends('admin.layout.app')

@section('title')
    {{ $dumyProduct->name ?? "{{ __('Show') Dumy Product" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Dumy Product Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('dumy-products.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-arrow-circle-left"></i>
                </span>
                Back
            </a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Show') }} Dumy Product</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>Brand Id:</strong>
                            {{ $dumyProduct->brand_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Category Id:</strong>
                            {{ $dumyProduct->category_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Sub Category Id:</strong>
                            {{ $dumyProduct->sub_category_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Name:</strong>
                            {{ $dumyProduct->name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Composition Id:</strong>
                            {{ $dumyProduct->composition_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Description:</strong>
                            {{ $dumyProduct->description }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Firebasepath:</strong>
                            {{ $dumyProduct->firebasepath }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Thumbnail:</strong>
                            {{ $dumyProduct->thumbnail }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Quantity:</strong>
                            {{ $dumyProduct->quantity }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Rating:</strong>
                            {{ $dumyProduct->rating }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>In Stock:</strong>
                            {{ $dumyProduct->in_stock }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Download:</strong>
                            {{ $dumyProduct->download }}
                        </div>

        </div>
    </div>
</div>
@endsection
