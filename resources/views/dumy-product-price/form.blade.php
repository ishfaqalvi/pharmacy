<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('product_id') }}
        {{ Form::text('product_id', $dumyProductPrice->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id','required']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $dumyProductPrice->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('old_price') }}
        {{ Form::text('old_price', $dumyProductPrice->old_price, ['class' => 'form-control' . ($errors->has('old_price') ? ' is-invalid' : ''), 'placeholder' => 'Old Price','required']) }}
        {!! $errors->first('old_price', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('new_price') }}
        {{ Form::text('new_price', $dumyProductPrice->new_price, ['class' => 'form-control' . ($errors->has('new_price') ? ' is-invalid' : ''), 'placeholder' => 'New Price','required']) }}
        {!! $errors->first('new_price', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('discount') }}
        {{ Form::text('discount', $dumyProductPrice->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount','required']) }}
        {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('default') }}
        {{ Form::text('default', $dumyProductPrice->default, ['class' => 'form-control' . ($errors->has('default') ? ' is-invalid' : ''), 'placeholder' => 'Default','required']) }}
        {!! $errors->first('default', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
