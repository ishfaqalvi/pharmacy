@extends('admin.layout.app')

@section('title')
    Popular Brands
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Brands Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <button class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill me-2 collapsed" data-bs-toggle="collapse" data-bs-target="#filters" aria-expanded="true">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-magnifying-glass"></i>
                </span>
                Filter
            </button>
            @can('brands-popularCreate')
            <a href="#" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill" data-bs-toggle="modal" data-bs-target="#addBrandModal">
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
            <form action="{{route('brands.popular.filter')}}" method="post">
                @csrf
                @include('admin.brand.popular.filter')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Popular Brands</h5>
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
                    <td class="text-center">
                        <form action="{{ route('brands.popular.destroy',$brand->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
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
            {{ $brands->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@include('admin.brand.popular.create')
@endsection

@section('script')
<script>
    $(function () {
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
                brand_id:{
                    "remote": {
                        url: "{{ route('brands.popular.checkBrand') }}",
                        type: "POST",
                        data: {
                            _token: _token,
                            brand: function() {
                                return $("#brand").val();
                            }
                        }
                    }
                }
            },
            messages:{
                brand_id: { remote: "Record already exist!" }
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
    });
</script>
<script>
    $(function () {
        function formatRepo (repo) {
            if (repo.loading) return repo.text;
            const markup = `
                <div class="select2-result-repository clearfix">
                    <div class="select2-result-repository__avatar"><img src="${repo.logo}" /></div>
                    <div class="select2-result-repository__meta">
                        <div class="select2-result-repository__title">${repo.name}</div>
                    </div>
                    <div class="select2-result-repository__statistics">
                        <div class="select2-result-repository__forks">Popular #: ${repo.popular}</div>
                    </div>
                </div>
            `;
            return markup;
        }
        function formatRepoSelection (repo) {
            return repo.name || repo.text;
        }
        $('.select-remote-data').select2({
            dropdownParent: $("#addBrandModal"),
            ajax: {
                url: "{{route('brands.search')}}",
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