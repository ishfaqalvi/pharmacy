<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            {{ Form::label('title') }}
            {{ Form::text('title', $slider->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('type') }}
            {{ Form::select('type', ['Brand' => 'Brand', 'Category' => 'Category', 'Sub Category' => 'Sub Category', 'Product' => 'Product','Simple' => 'Simple'], $slider->type, ['class' => 'form-control select' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required','id' => 'selectField']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('type_parent') }}
            {{ Form::text('type_id', $slider->type_id, ['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => 'Name of parent','id'=>'parent']) }}
            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('order') }}
            {{ Form::number('order', $slider->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Order','min'=>'1']) }}
            {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $slider->image ? $slider->image : '', $slider->image ? '' : 'required','data-height' => '275']) }}
        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
