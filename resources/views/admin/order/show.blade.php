@extends('admin.layout.app')

@section('title')
    {{ $order->order_number }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Order Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            @if(auth()->user()->can('orders-addProduct') && $order->status == 'Pending')
            <a href="#" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill me-2" data-bs-toggle="modal" data-bs-target="#addProduct">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Add New
            </a>
            @endif
            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Order</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>User name:</strong>
                {{ $order->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $order->email }}
            </div>
            <div class="form-group mb-3">
                <strong>City:</strong>
                {{ $order->city->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Address:</strong>
                {{ $order->address }}
            </div>
            <div class="form-group mb-3">
                <strong>Contact Number:</strong>
                {{ $order->contact_number }}
            </div>
            <div class="form-group mb-3">
                <strong>Description:</strong>
                {{ $order->description }}
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th colspan="2">Product name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Amount</th>
                            <th class="text-center" style="width: 20px;"><i class="ph-dots-three"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($total = 0)
                        @foreach ($order->details as $key => $row)
                        @php($total += $row->amount)
                        <tr>
                            <td class="pe-0" style="width: 45px;">
                                <a href="{{ route('products.all.show',$row->product_id) }}" target="_blank">
                                    <img src="{{ $row->product->thumbnail }}" height="60" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('products.all.show',$row->product_id) }}" class="d-block fw-semibold" target="_blank">
                                    {{ Str::limit($row->product->name, 30) }} 
                                </a>
                                <div class="d-inline-flex align-items-center text-muted fs-sm">
                                    <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                    {{ $row->product->composition->formula ?? "" }}
                                </div>
                            </td>
                            <td>
                                <a href="#" class="d-block fw-semibold">
                                    {{ $row->product->category->name }}
                                </a>
                                <div class="d-inline-flex align-items-center text-muted fs-sm">
                                    <span class="bg-secondary rounded-pill p-1 me-1">
                                    </span>
                                    {{ $row->product->subCategory->name }}
                                </div>
                            </td>
                            <td>{{ $row->productPrice->title .'( '.$row->price.' )' }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td><h6 class="mb-0">&#8360; {{ $row->amount }}</h6></td>
                            <td class="text-center">
                                @include('admin.order.detail.actions')
                            </td>
                        </tr>
                        @include('admin.order.detail.edit')
                        @endforeach
                        <tr class="table-light">
                            <td colspan="6" class="fw-semibold">Total Amount</td>
                            <td class="text-end">
                                <span class="badge bg-secondary rounded-pill">{{ $total }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.order.detail.create')
@endsection

@section('script')
<script>
    $(function () {
        $(".select").select2();
        var _token = $("input[name='_token']").val();
        $('.validate').validate({
            errorClass: 'validation-invalid-label',
            successClass: 'validation-valid-label',
            validClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
                $(element).addClass('is-invalid');
                $(element).removeClass('is-valid');
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
            success: function(label) {
                label.addClass('validation-valid-label').text('Success.');
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('select2-hidden-accessible')) {
                    error.appendTo(element.parent());
                }else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                    error.appendTo(element.parent().parent());
                }else {
                    error.insertAfter(element);
                }
            },
            rules: {
                product_id:{
                    "remote": {
                        url: "{{ route('orders.product.check') }}",
                        type: "POST",
                        data: {
                            _token: _token,
                            order_id: function() {
                                return $("#orderId").val();
                            },
                            product: function() {
                                return $("#product").val();
                            }
                        }
                    }
                }
            },
            messages:{
                product_id: { remote: "Record already exist!" }
            }
        });
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
        $('select[name=product_id]').change(function () {
            let id = $(this).val();
            $('select[name=price_id]').html('<option>--Select--</option>');
            $.get('/admin/orders/product/prices', {id: id}).done(function (result) {
                let data = JSON.parse(result);
                $('div.prices').show('slow');
                $.each(data, function (i, val) {
                    $('select[name=price_id]').append($('<option></option>')
                        .val(val.id)
                        .html(val.title)
                        .attr('price', val.new_price));
                })
            }).fail(function (error) {
                console.log(error);
            });
        });
        $('select[name=price_id]').change(function () {
            var selectedPrice = $(this).find('option:selected').attr('price');
            $('div.price').show('slow');
            $('#price').val(selectedPrice);
        });
        $('#editPrices').change(function(){
            var selectedPrice = $(this).find('option:selected').attr('price');
            $('#editPrice').val(selectedPrice);
        });
    });
</script>
<script>
    $(function () {
        function formatRepo (repo) {
            if (repo.loading) return repo.text;
            const markup = `
                <div class="select2-result-repository clearfix">
                    <div class="select2-result-repository__avatar"><img src="${repo.thumbnail}" /></div>
                    <div class="select2-result-repository__meta">
                        <div class="select2-result-repository__title">${repo.name}</div>
                        <div class="select2-result-repository__description">${repo.formula}</div>
                    </div>
                    <div class="select2-result-repository__statistics">
                        <div class="select2-result-repository__forks">Quantity #: ${repo.quantity}</div>
                    </div>
                </div>
            `;
            return markup;
        }
        function formatRepoSelection (repo) {
            return repo.name || repo.text;
        }
        $('.select-remote-data').select2({
            dropdownParent: $("#addProduct"),
            ajax: {
                url: "{{route('orders.product.search')}}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page
                    };
                },
                processResults: function (responce, params) {
                    params.page = params.page || 1;
                    return {
                        results: responce.data,
                        pagination: {
                            more: (params.page * 10) < responce.total
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; },
            minimumInputLength: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });
    });
</script>
@endsection