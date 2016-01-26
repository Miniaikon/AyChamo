@extends('layouts.principal')

@section('content')
	<article>
		{!!Form::model(Auth::user(),['route'=>['update.update', Auth::user()->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])!!}
			<div class="form-group">
				<label for="Nombre" class="">Nombre:</label>
				{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
			</div>
			<div class="form-group">
			 	<label for="Apellido" class="">Apellido:</label>
				{!!Form::text('lname',null,['class'=>'form-control','placeholder'=>'Apellido'])!!}
			</div>
			<div class="form-group">
			 	<label for="direccion" class="">Dirección:</label>
				{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección'])!!}
			</div>
			<div class="form-group">
			 	<label for="nacimient" class="">Fecha de nacimiento:</label>
				{!!Form::date('fecha_nac',null,['class'=>'form-control','placeholder'=>'Fecha de nacimiento'])!!}
			</div>
			<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
		{!!Form::close()!!}
	</article>
@endsection