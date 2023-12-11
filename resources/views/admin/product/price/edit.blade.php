<div id="editPrice" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.prices.update') }}" class="form-validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Update Product Price') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('id', null,['id' => 'edit-id']) }}
                        <div class="form-group mb-3">
                            {{ Form::label('title') }}
                            {{ Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required','id'=>'edit-title']) }}
                            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            {{ Form::label('price') }}
                            {{ Form::number('price', null, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price','required','min'=>'1','id'=>'edit-price']) }}
                            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            {{ Form::label('discount') }}
                            {{ Form::number('discount', null, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount','min'=>'0','id' => 'edit-discount']) }}
                            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input form-check-input-success" id="edit-default" name="default" value="Yes">
                                <label class="form-check-label" for="default">Default</label>
                            </div>
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