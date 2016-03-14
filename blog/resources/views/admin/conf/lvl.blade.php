@extends('layouts.admin')

@section('content')
	@if(Auth::user()->nivel == 2)
		<article>
				<h1>Nivelar a: <span style="color:blue;">{!!$users->apodo!!}</span></h1>
				<h2>Seleccione un nivel para <span style="color:blue;">{!!$users->apodo!!}</span></h2>
				{!!Form::model($users,['route'=>['admin.update', $users->id], 'method'=>'PUT'])!!}
					{!!Form::radio('nivel', '0')!!} <span class="glyphicon glyphicon-user"></span> Usuario <br>
					{!!Form::radio('nivel', '1')!!} <span class="glyphicon glyphicon-eye-open"> </span>Moderador <br>
					{!!Form::radio('nivel', '2')!!} <span class="glyphicon glyphicon-king"></span> Administrador <br>
					<div class="form-group">
					<button class="btn btn-primary" type="submit">Nivelar</button>
					</div>
					{!!Form::close()!!} 
		</article>
	@endif
@endsection