@extends('layouts.admin')

@section('content')
	@if((Auth::user()->nivel == 1) || (Auth::user()->nivel == 2))
<article>
	<table class="table table-hover table-condensed table-bordered table-responsive">
		<thead>
			<th>Publicacion</th>
			<th>Fecha Origen</th>
			<th>Actualizado</th>
			<th>Autor</th>
			<th>Accion</th>
		</thead>
		<tbody>
		@foreach($users as $notice)
		<tr>
			<td>{!!$notice->titulo!!}</td>
			<td>{!!$notice->created_at!!}</td>
			<td>{!!$notice->update_at!!}</td>
			<td>Por: {!!$notice->autor!!}</td>
			<td>
				<div class="col-md-5">
					{!!Form::open(['route'=>['notice.destroy', $notice->id], 'method'=>'DELETE'])!!}
						<button data-toggle="tooltip" title="¿Borra?" data-placement="left" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
						</button>
					{!!Form::close()!!}
				</div>
				<div class="col-md-5">
					 {!!link_to_route('notice.edit', $title = '', $parameters = [$notice->id], $attributes = ['title'=>'Editar articulo', 'class'=>'btn btn-warning glyphicon glyphicon-pencil'])!!}
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