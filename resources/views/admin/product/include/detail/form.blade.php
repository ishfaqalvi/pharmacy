<form method="POST" action="{{ route('products.update', $product->id) }}" class="editValidate" role="form" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <div class="row">
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('brand') }}
            {{ Form::select('brand_id', brands(), $product->brand_id, ['class' => 'form-control select' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('brand_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('category') }}
            {{ Form::select('category_id', categories(), $product->category_id, ['class' => 'form-control select' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('sub_category') }}
            {{ Form::select('sub_category_id', [], $product->sub_category_id, ['class' => 'form-control select' . ($errors->has('sub_category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','default' => $product->sub_category_id]) }}
            {!! $errors->first('sub_category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('name') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('composition') }}
            {{ Form::select('composition_id', compositions(), $product->composition_id, ['class' => 'form-control select' . ($errors->has('composition_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('composition_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         <div class="form-group col-lg-6 mb-3">
            {{ Form::label('quantity') }}
            {{ Form::number('quantity', $product->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','min'=>'0','required']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('rating') }}
            {{ Form::number('rating', $product->rating, ['class' => 'form-control' . ($errors->has('rating') ? ' is-invalid' : ''), 'placeholder' => 'Rating','required']) }}
            {!! $errors->first('rating', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('in_stock') }}
            {{ Form::select('in_stock', ['true' => 'True', 'false' => 'False'], $product->in_stock, ['class' => 'form-control form-select' . ($errors->has('in_stock') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('in_stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('thumbnail') }}
            {{ Form::file('thumbnail', ['class' => 'form-control dropify' . ($errors->has('thumbnail') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $product->thumbnail, isset($product->thumbnail) ? '' : 'required','data-height' => '225']) }}
            {!! $errors->first('thumbnail', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-6 mb-3">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','required']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
        </div>
    </div>
</form>