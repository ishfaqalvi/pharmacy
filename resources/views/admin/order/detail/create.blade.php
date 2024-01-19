<div id="addProduct" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('orders.product.store') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Product') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('order_id', $order->id, ['id'=>'orderId']) }}
                        <div class="form-group mb-3">
                            {{ Form::label('product') }}
                            {{ Form::select('product_id', [], Null, ['class' => 'form-control select-remote-data' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required','id'=>'product']) }}
                            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group mb-3 prices" style="display: none;">
                            {{ Form::label('prices') }}
                            {{ Form::select('price_id', [], Null, ['class' => 'form-control select' . ($errors->has('price_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required','id'=>'price_id']) }}
                            {!! $errors->first('price_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group mb-3 price" style="display: none;">
                            {{ Form::label('price') }}
                            {{ Form::number('price', Null, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => '0', 'required','id'=>'price','readonly']) }}
                            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group mb-3">
                            {{ Form::label('quantity') }}
                            {{ Form::number('quantity', 1, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'min' => '1', 'required']) }}
                            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
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