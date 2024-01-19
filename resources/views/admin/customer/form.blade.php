<div class="row">
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('email') }}
        {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('phone_number') }}
        {{ Form::text('phone_number', $user->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number','required']) }}
        {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('contact_number') }}
        {{ Form::text('contact_number', $user->contact_number, ['class' => 'form-control' . ($errors->has('contact_number') ? ' is-invalid' : ''), 'placeholder' => 'Contact Number','required']) }}
        {!! $errors->first('contact_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('city') }}
        {{ Form::select('city_id', cities(), $user->city_id, ['class' => 'form-control select' . ($errors->has('city_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('address') }}
        {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address','required']) }}
        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
    