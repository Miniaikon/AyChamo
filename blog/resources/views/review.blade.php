@extends('layouts.principal')

@section('content')
	@foreach($users as $notice)
		<article>
			@if(Auth::user())
				@if(Auth::user()->nivel == 1 || Auth::user()->nivel == 2)
					<div class="alert alert-info admin col-md-12">
						<div class="col-md-1">{!!Form::open(['route'=>['notice.destroy', $notice->id], 'method'=>'DELETE'])!!}<button data-toggle="tooltip" title="¿Borra?" data-placement="left" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>{!!Form::close()!!}</div>
						<div class="col-md-1">
							{!!link_to_route('notice.edit', $title = '', $parameters = [$notice->id], $attributes = ['title'=>'Editar articulo', 'class'=>'btn btn-warning glyphicon glyphicon-pencil'])!!}
						</div>
						<div class="col-md-10"></div>
					</div>
				@endif
			@endif
				<h1>{!!link_to_route('notice.show', $title = $notice->titulo, $parameters = [$notice->id,str_replace(" ","-",$notice->titulo)], $attributes = ['style'=>'text-decoration:none;color:#2c3e50;'], $secure = null)!!}</h1>
				<small><span class="glyphicon glyphicon-user"></span> {{$notice->autor}} | <span class="glyphicon glyphicon-calendar"></span> {{$notice->created_at}} </small> | <span class="glyphicon glyphicon-th-list"></span> {{$notice->cate}}</small> | 
 |
		@if($notice->comment == 0)
			<span class="glyphicon glyphicon-comment"></span> Sin comentarios 
		@else
		<a style="text-decoration:none;" href="/notice/{{$notice->id}}#comentarios"><span class="glyphicon glyphicon-comment"></span> {{$notice->comment}} Comentarios </a>
		@endif
				<hr>
				{!!$notice->content!!}
				<hr>
				<footer>  
					<center>
						<a class="btn btn-social btn-twitter"><span class="fa fa-twitter"></span> Twitter</a>
						<a class="btn btn-social btn-facebook"><span class="fa fa-facebook"></span> Facebook</a>
						<a class="btn btn-social btn-google"><span class="fa fa-google"></span> Google+</a>
					</center>
				</footer>
		</article><br>
		<div id="comentarios"></div>
		<?php $comentario = $notice->comment; ?>
	@endforeach

			@include('notice.Coment')
	@if(Auth::user())
			@include('notice.comentarios')
	@else
		<div class="panel panel-default">
			<div class="panel-body">
				<h3><span class="glyphicon glyphicon-certificate"></span> Necesitas estar conectado para poder comentar.</h3>
			</div>
		</div>
	@endif
@endsection