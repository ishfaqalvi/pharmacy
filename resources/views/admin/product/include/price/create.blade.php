<div id="addPrice" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.prices.store') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create Product Price') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('product_id', $product->id) }}
                        <div class="form-group mb-3">
                            {{ Form::label('title') }}
                            {{ Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
                            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            {{ Form::label('price') }}
                            {{ Form::number('new_price', null, ['class' => 'form-control' . ($errors->has('new_price') ? ' is-invalid' : ''), 'placeholder' => 'Price','required','min'=>'1']) }}
                            {!! $errors->first('new_price', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            {{ Form::label('discount') }}
                            {{ Form::number('discount', null, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount','min'=>'0']) }}
                            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        @if($product->prices()->count() > 0)
                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input form-check-input-success" id="default" name="default" value="Yes">
                                <label class="form-check-label" for="default">Default</label>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="default" value="Yes">
                        @endif
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