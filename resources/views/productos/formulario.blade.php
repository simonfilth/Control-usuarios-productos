{!! csrf_field() !!}
<!--- Nombre Field --->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Precio Field --->
<div class="form-group">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control']) !!}
</div>

<!--- Cantidad Field --->
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!--- Descripcion Field --->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::textArea('descripcion', null, ['class' => 'form-control','rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoría:') !!}
    {!! Form::select('categoria_id', config('options.categoria'), null, ['class' => 'form-control'])!!}
</div>

<!--- Imagen Field --->
<div class="form-group">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::file('imagen') !!}
</div>