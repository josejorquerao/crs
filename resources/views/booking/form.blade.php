<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ingress') }}
            {{ Form::text('ingress', $booking->ingress, ['class' => 'form-control' . ($errors->has('ingress') ? ' is-invalid' : ''), 'placeholder' => 'Ingress']) }}
            {!! $errors->first('ingress', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('egress') }}
            {{ Form::text('egress', $booking->egress, ['class' => 'form-control' . ($errors->has('egress') ? ' is-invalid' : ''), 'placeholder' => 'Egress']) }}
            {!! $errors->first('egress', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $booking->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detail_id') }}
            {{ Form::text('detail_id', $booking->detail_id, ['class' => 'form-control' . ($errors->has('detail_id') ? ' is-invalid' : ''), 'placeholder' => 'Detail Id']) }}
            {!! $errors->first('detail_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $booking->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('guest_id') }}
            {{ Form::text('guest_id', $booking->guest_id, ['class' => 'form-control' . ($errors->has('guest_id') ? ' is-invalid' : ''), 'placeholder' => 'Guest Id']) }}
            {!! $errors->first('guest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cottage_id') }}
            {{ Form::text('cottage_id', $booking->cottage_id, ['class' => 'form-control' . ($errors->has('cottage_id') ? ' is-invalid' : ''), 'placeholder' => 'Cottage Id']) }}
            {!! $errors->first('cottage_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>