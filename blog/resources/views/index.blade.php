@extends('layouts.principal')

@section('content')
@foreach($users as $notice)
	<article>
	@if(Auth::user())
		<div class="alert alert-info admin col-md-12">
			<div class="col-md-1">{!!Form::open(['route'=>['notice.destroy', $notice->id], 'method'=>'DELETE'])!!}<button data-toggle="tooltip" title="¿Borra?" data-placement="left" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>{!!Form::close()!!}</div>
			<div class="col-md-1">
			{!!link_to_route('notice.edit', $title = '', $parameters = $notice->id, $attributes = ['title'=>'Editar articulo', 'class'=>'btn btn-warning 
glyphicon glyphicon-pencil'])!!}

		</div>
		<div class="col-md-10">
			<a href="/notice/create" class="btn btn-primary" title="Nuevo articulo"><span class="glyphicon glyphicon-plus"></span></a>
		</div>

		</div>
	@endif
		<h1><a style="text-decoration:none;" href="#">{{$notice->titulo}}</a></h1>
		<small><span class="glyphicon glyphicon-user"></span> {{$notice->autor}} | <span class="glyphicon glyphicon-calendar"></span> {{$notice->created_at}} </small> | <span class="glyphicon glyphicon-th-list"></span> {{$notice->cate}}</small><hr>
		{!!substr($notice->content,0,1000)!!}
		<hr>
		<footer>  
		<center>
			<a class="btn btn-social btn-twitter"><span class="fa fa-twitter"></span> Twitter</a>
			<a class="btn btn-social btn-facebook"><span class="fa fa-facebook"></span> Facebook</a>
			<a class="btn btn-social btn-google"><span class="fa fa-google"></span> Google+</a>
		</center>
		</footer>
	</article><br>
	@endforeach
	{!!$users->render()!!}
@endsection