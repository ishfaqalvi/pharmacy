@extends('admin.layout.app')

@section('title')
    {{ __('Update') }} Product
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
            <a href="{{ route('products.all.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Edit ') }} Product </h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight mb-3">
                <li class="nav-item">
                    <a href="#detail" class="nav-link active" data-bs-toggle="tab">
                        <i class="ph-note-pencil me-2"></i>
                        Detail
                    </a>
                </li>
                @can('products-priceList')
                <li class="nav-item">
                    <a href="#prices" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-currency-circle-dollar me-2"></i>
                        {{ __('Prices') }}
                    </a>
                </li>
                @endcan
                @can('products-imageList')
                <li class="nav-item">
                    <a href="#images" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-file-image me-2"></i>
                        {{ __('Images') }}
                    </a>
                </li>
                @endcan
                @can('products-relatedList')
                <li class="nav-item">
                    <a href="#related" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-handshake me-2"></i>
                        {{ __('Related') }}
                    </a>
                </li>
                @endcan
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="detail">
                    @include('admin.product.include.detail.form')
                </div>
                <div class="tab-pane fade" id="prices">
                    @include('admin.product.include.price.index')
                </div>
                <div class="tab-pane fade" id="images">
                    @include('admin.product.include.image.index')
                </div>
                <div class="tab-pane fade" id="related">
                    @include('admin.product.include.related.index')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $(".select").select2();
        $('.dropify').dropify();
        $('.editValidate').validate({
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
            }
        });
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
            }
        });
        $('.editRecord').click(function(){
            $('#edit-id').val($(this).data('id'));
            $('#edit-title').val($(this).data('title'));
            $('#edit-price').val($(this).data('price'));
            $('#edit-discount').val($(this).data('discount'));
            if($(this).data('default') === "Yes"){
                $('#edit-default').prop('checked', true);
            }else{
                $('#edit-default').prop('checked', false);
            }
            $('#editPrice').modal('show');
        });
        $('.form-validate').validate({
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
            }
        });
        var _token = $("input[name='_token']").val();
        $('.relatedValidate').validate({
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
                child_id:{
                    "remote": {
                        url: "{{ route('products.related.checkProduct') }}",
                        type: "POST",
                        data: {
                            _token: _token,
                            parent: function() {
                                return $("#parent").val();
                            },
                            product: function() {
                                return $("#product").val();
                            }
                        }
                    }
                }
            },
            messages:{
                child_id: { remote: "Record already exist!" }
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
        var sub_category_id = $('select[name=sub_category_id]').attr('default');
        let id = $('select[name=category_id]').val();
        sub_category_list(id, sub_category_id);
        $('select[name=category_id]').change(function () {
            let id = $(this).val();
            sub_category_list(id, 0);
        });
        function sub_category_list(id,sub_category_id){
            $('select[name=sub_category_id]').html('<option>--Select--</option>');
            $.get('/admin/products/sub-categories', {id: id}).done(function (result) {
                let data = JSON.parse(result);
                var selected_sub_category_id = 0;
                $.each(data, function (i, val) {
                    if(val.id == sub_category_id){
                        selected_sub_category_id = val.id;
                        $('select[name=sub_category_id]').append($('<option>', 
                            {selected : 'selected', value : val.id, text : val.name}
                        ));
                    }else{
                        $('select[name=sub_category_id]').append($('<option>', 
                            {value : val.id,  text : val.name}
                        ));
                    }
                });
            }).fail(function (error) {
                console.log(error);
            }); 
        }
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