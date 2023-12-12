<div id="addBrandModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('brands.popular.store') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Brand') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group mb-3">
                            {{ Form::label('brand') }}
                            {{ Form::select('brand_id', [], Null, ['class' => 'form-control select-remote-data' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required','id'=>'brand']) }}
                            {!! $errors->first('brand_id', '<div class="invalid-feedback">:message</div>') !!}
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