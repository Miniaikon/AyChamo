@extends('layouts.principal')

@section('content')

	<article>
		<h1>Cambiar foto de perfil.</h1>
		{!!Form::open(['route'=>['upload.update', Auth::user()->id], 'method' => 'PUT', 'files' => true, 'enctype'=>'multipart/form-data'])!!}
		<div class="form-group">
			{!!Form::label('label', 'Selecciona la imagen')!!}
			{!!Form::file('imagen')!!}
		</div>
			<button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir</button>
		{!!Form::close()!!}
	</article>

@endsection