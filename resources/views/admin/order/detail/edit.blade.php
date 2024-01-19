<div id="editProduct{{ $row->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('orders.product.update', $row->id) }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Update Product Detail') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group mb-3 prices">
                            <select name="price_id" class="form-control form-select" id="editPrices">
                                @foreach($row->product->prices as $record)
                                <option 
                                    value="{{ $record->id}}" 
                                    price="{{$record->new_price}}"
                                    {{ $record->id == $row->price_id ? 'selected' : ''}}
                                    >
                                    {{ $record->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            {{ Form::label('price') }}
                            {{ Form::number('price', $row->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'required','readonly','id'=>'editPrice']) }}
                            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('quantity') }}
                            {{ Form::number('quantity', $row->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','required']) }}
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