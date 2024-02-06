@extends('admin.layout.app')

@section('title')
    Order
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Order Managment</span>
        </h4>
    </div>
    @can('orders-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <button class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill me-2 collapsed" data-bs-toggle="collapse" data-bs-target="#filters" aria-expanded="true">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-funnel"></i>
                </span>
                Filter
            </button>
            <a href="{{ route('orders.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">Order</h5>
        </div>
        <table class="table datatable-basic">
            <thead class="thead">
                <tr>
                    <th>#</th>
					<th>User Name</th>
					<th>Contact #</th>
                    <th>Amount</th>
                    <th>Type</th>
					<th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->contact_number }}</td>
                    <td>{{ $order->shipping_cost + $order->totalAmount }}</td>
                    <td><span class="badge bg-secondary">{{ $order->type }}</span></td>
					<td>{{ $order->status }}</td>
                    <td class="text-center">@include('admin.order.actions')</td>
                </tr>
                <div id="orderAction{{ $order->id }}" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('orders.actions',$order->id) }}" class="validate" role="form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ __('Update Order') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            {{ Form::label('status') }}
                                            {{ Form::select('status', ['Accepted'=>'Accepted','Rejected'=>'Rejected','Shipped'=>'Shipped','Completed'=>'Completed'], Null, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required','id'=>'product']) }}
                                            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submitt</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

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