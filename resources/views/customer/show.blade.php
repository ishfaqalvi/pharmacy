@extends('admin.layout.app')

@section('title')
    {{ $customer->name ?? "{{ __('Show') Customer" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Customer Management</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('customers.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Customer</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>Name:</strong>
                            {{ $customer->name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Email:</strong>
                            {{ $customer->email }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Phone Number:</strong>
                            {{ $customer->phone_number }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>City Id:</strong>
                            {{ $customer->city_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Address:</strong>
                            {{ $customer->address }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Contact Number:</strong>
                            {{ $customer->contact_number }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Image:</strong>
                            {{ $customer->image }}
                        </div>

        </div>
    </div>
</div>
@endsection
