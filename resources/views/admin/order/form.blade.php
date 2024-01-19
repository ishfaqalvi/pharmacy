<div class="row">
    {{ Form::hidden('type', 'Simple') }}
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('user') }}
        {{ Form::select('user_id', users(), $order->user_id, ['class' => 'form-control select' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $order->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('email') }}
        {{ Form::email('email', $order->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('contact_number') }}
        {{ Form::text('contact_number', $order->contact_number, ['class' => 'form-control' . ($errors->has('contact_number') ? ' is-invalid' : ''), 'placeholder' => 'Contact Number','required']) }}
        {!! $errors->first('contact_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('city') }}
        {{ Form::select('city_id', cities(), $order->city_id, ['class' => 'form-control select' . ($errors->has('city_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('address') }}
        {{ Form::text('address', $order->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address','required']) }}
        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('description') }}
        {{ Form::textarea('description', $order->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','required','rows'=>'4']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
