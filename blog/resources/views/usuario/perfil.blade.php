@extends('layouts.principal')

@section('content') 
	<article>
	<h1>Perfil de {!!Auth::user()->apodo!!}</h1><hr>
		<div class="row">
			<div class="col-md-5">
				<img class="img-thumbnail img-responsive" src="../../fotos/{!!Auth::user()->imagen!!}" alt="">
				<center><a  class="btn btn-warning" href="profile/photo"><span class="glyphicon glyphicon-picture"></span> Cambiar foto</a></center><hr>
				<center><a class="btn btn-default" href="profile/edit"><span class="glyphicon glyphicon-cog"></span> Completar perfil</a></center>
				
			</div>
			<div class="col-md-7">

				<table class="table table-condensed table-bordered table-hover tabl-respondive">
					<tr>
						<td class="active">Nombre: </td>
						<td>{!!Auth::user()->name!!}</td>
					</tr>
					<tr>
						<td class="active">Apellido: </td>
						<td>{!!Auth::user()->lname!!}</td>
					</tr>
					<tr>
						<td class="active">Apodo: </td>
						<td>{!!Auth::user()->apodo!!}</td>
					</tr>
					<tr>
						<td class="active">Correo: </td>
						<td>{!!Auth::user()->email!!}</td>
					</tr>
					<tr>
						<td class="active">Direccion: </td>
						<td>{!!Auth::user()->direccion!!}</td>
					</tr>
					<tr>
						<td class="active">Fecha de nacimiento: </td>
						<td>{!!Auth::user()->fecha_nac!!}</td>
					</tr>
					<tr>
						<td class="active">Fecha de registro: </td>
						<td>{!!Auth::user()->created_at!!}</td>
					</tr>
				</table>
			</div>
		</div>
	</article>
@endsection