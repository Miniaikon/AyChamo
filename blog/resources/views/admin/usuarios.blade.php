@extends('layouts.admin')

@section('content')
	@if(Auth::users()->nivel == 2)
<article>
	<table class="table table-hover table-condensed table-bordered table-responsive">
		<thead>
			<th>#</th>
			<th>Apodo</th>
			<th>Origen</th>
			<th>E-Mail</th>
			<th>Nivel</th>
			<th>Accion</th>
		</thead>
		<tbody>
		@foreach($users as $user)
		<tr>
			<td>{!!$user->id!!}</td>
			<td>{!!$user->apodo!!}</td>
			<td>{!!$user->created_at!!}</td>
			<td>{!!$user->email!!}</td>
			<td>{!!$user->nivel!!}</td>
			<td>
				<div class="col-md-5">
					{!!Form::open(['route'=>['admin.destroy', $user->id], 'method'=>'DELETE'])!!}
						<button data-toggle="tooltip" title="¿Borra?" data-placement="left" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span> Eliminar
						</button>
					{!!Form::close()!!}
				</div>
				<div class="col-md-5">
					 {!!link_to_route('admin.edit', $title = ' Nivelar', $parameters = [$user->id], $attributes = ['title'=>'Editar articulo', 'class'=>'btn btn-warning glyphicon glyphicon-pencil'])!!}
				<div>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
	{!!$users->render()!!}
</article>
@endif
@endsection