<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('brand_id') }}
        {{ Form::text('brand_id', $product->brand_id, ['class' => 'form-control' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => 'Brand Id','required']) }}
        {!! $errors->first('brand_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('category_id') }}
        {{ Form::text('category_id', $product->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id','required']) }}
        {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('sub_category_id') }}
        {{ Form::text('sub_category_id', $product->sub_category_id, ['class' => 'form-control' . ($errors->has('sub_category_id') ? ' is-invalid' : ''), 'placeholder' => 'Sub Category Id','required']) }}
        {!! $errors->first('sub_category_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('type') }}
        {{ Form::text('type', $product->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type','required']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('formula') }}
        {{ Form::text('formula', $product->formula, ['class' => 'form-control' . ($errors->has('formula') ? ' is-invalid' : ''), 'placeholder' => 'Formula','required']) }}
        {!! $errors->first('formula', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('description') }}
        {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','required']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('thumbnail') }}
        {{ Form::text('thumbnail', $product->thumbnail, ['class' => 'form-control' . ($errors->has('thumbnail') ? ' is-invalid' : ''), 'placeholder' => 'Thumbnail','required']) }}
        {!! $errors->first('thumbnail', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('quantity') }}
        {{ Form::text('quantity', $product->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','required']) }}
        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('rating') }}
        {{ Form::text('rating', $product->rating, ['class' => 'form-control' . ($errors->has('rating') ? ' is-invalid' : ''), 'placeholder' => 'Rating','required']) }}
        {!! $errors->first('rating', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('in_stock') }}
        {{ Form::text('in_stock', $product->in_stock, ['class' => 'form-control' . ($errors->has('in_stock') ? ' is-invalid' : ''), 'placeholder' => 'In Stock','required']) }}
        {!! $errors->first('in_stock', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
