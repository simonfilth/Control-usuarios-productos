{!! csrf_field() !!}
<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textArea('address', null, ['class' => 'form-control','rows'=>'3']) !!}
</div>
<!--- Username Field --->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>
<!--- Password Field --->
<div class="form-group">
    {!! Form::label('password', 'Clave:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tipousuarioid', 'Tipo de Usuario:') !!}
    {!!Form::select('tipousuarioid', array('1' => 'Administrador', '2' => 'Cliente'), null, ['class' => 'form-control'])!!}
</div>