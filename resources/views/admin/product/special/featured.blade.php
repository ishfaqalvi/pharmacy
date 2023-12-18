@extends('admin.layout.app')

@section('title')
    Featured Product
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Product Managment</span>
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
            @can('products-specialCreate')
            <a href="#" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill" id="addProduct">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Add New
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
            <form action="{{route('products.special.featuredFilter')}}" method="post">
                @csrf
                @include('admin.product.filter')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Featured Product</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th colspan="2">Product name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="text-center" style="width: 20px;"><i class="ph-dots-three"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td class="pe-0" style="width: 45px;">
                            <a href="#">
                                <img src="{{ $product->thumbnail }}" height="60" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="#" class="d-block fw-semibold">
                                {{ Str::limit($product->name, 30) }} 
                            </a>
                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                {{ $product->formula }}
                            </div>
                        </td>
                        <td>
                            <a href="#" class="d-block fw-semibold">
                                {{ $product->category->name }}
                            </a>
                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                <span class="bg-secondary rounded-pill p-1 me-1">
                                </span>
                                {{ $product->subCategory->name }}
                            </div>
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            @foreach($product->prices as $price)
                            <div>
                                @if($price->default == 'Yes')
                                <i class="ph-check-circle fs-base lh-base align-top text-success me-1"></i>
                                @else
                                <i class="ph-clock fs-base lh-base align-top text-danger me-1"></i>
                                @endif
                                {{ $price->title }}:
                                <a href="#">&#8360; {{ $price->new_price }}</a>
                            </div>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <form action="{{ route('products.special.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="type" value="Featured">
                                <button class="btn btn-danger btn-sm btn-icon sa-confirm">
                                    <span><i class="ph-trash"></i></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@include('admin.product.special.create')
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
                        url: "{{ route('products.special.checkProduct') }}",
                        type: "POST",
                        data: {
                            _token: _token,
                            type: function() {
                                return $("#type").val();
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
        $('#addProduct').click(function(){
            $('#type').val('Featured');
            $('#addProductModal').modal('show');
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
            dropdownParent: $("#addProductModal"),
            ajax: {
                url: "{{route('products.search')}}",
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