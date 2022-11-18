<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ingress') }}
            {{ Form::text('ingress', $reservation->ingress, ['class' => 'form-control' . ($errors->has('ingress') ? ' is-invalid' : ''), 'placeholder' => 'Ingress']) }}
            {!! $errors->first('ingress', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('egress') }}
            {{ Form::text('egress', $reservation->egress, ['class' => 'form-control' . ($errors->has('egress') ? ' is-invalid' : ''), 'placeholder' => 'Egress']) }}
            {!! $errors->first('egress', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::select('status', $status,$reservation->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status' ,'id' => 'status','value'=>'text']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detail_id') }}
            {{ Form::text('detail_id', $reservation->detail_id, ['class' => 'form-control' . ($errors->has('detail_id') ? ' is-invalid' : ''), 'placeholder' => 'Detail Id']) }}
            {!! $errors->first('detail_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $reservation->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('guest_id') }}
            {{ Form::text('guest_id', $reservation->guest_id, ['class' => 'form-control' . ($errors->has('guest_id') ? ' is-invalid' : ''), 'placeholder' => 'Guest Id']) }}
            {!! $errors->first('guest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cottage_id') }}
            {{ Form::text('cottage_id', $reservation->cottage_id, ['class' => 'form-control' . ($errors->has('cottage_id') ? ' is-invalid' : ''), 'placeholder' => 'Cottage Id']) }}
            {!! $errors->first('cottage_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success m-2">Aceptar</button>
        <a href="{{route('reservations.index')}}" class="btn btn-danger m-2">Volver</a>
    </div>
</div>

<script>
select = document.getElementById("status");
select.onchange = function(){ 
    console.log(this.value); 
    console.log(this.innerHTML); 
    
    var options = this.getElementsByTagName("#status");
    console.log(options); 
    var optionHTML = options[this.selectedIndex].innerHTML;  
    console.log(optionHTML); 
};
</script>