@extends('layouts.principal')

@section('content')
	@if(Auth::user()->nivel == 1 || Auth::user()->nivel == 2)
		@include('alerts.request')
		{!!Html::script('ckeditor/ckeditor.js')!!}
		<article>
		{!!Form::open(['route'=>'notice.store','method'=>'POST'])!!}
			<div class="form-group">
				<label for="" class="sr-only">Titulo</label>
				{!!Form::text('titulo', null,['class'=>'form-control', 'placeholder'=>'Titulo de la noticia'])!!}
			</div>
			<div class="form-group">
			<a href="/uploader" onclick="window.open(this.href, 'SubirImagen', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=600,height=800'); return false;" target="_Blank" class="btn btn-primary">
				<span class="glyphicon glyphicon-picture"></span>
			</a><hr>
				<label for="" class="sr-only">Contenido</label>
				{!!Form::textarea('content', null,['class'=>'ckeditor', 'placeholder'=>'Contenido', 'id'=>'editor1'])!!}
				{!!Html::script('ck.js')!!}
			</div>
			<div class="form-group">
				<label class="sr-only">Categoría</label><br>
				<center>
				  	{!!Form::radio('cate', 'Humor')!!} Humor | 
					{!!Form::radio('cate', 'Noticias')!!} Noticias | 
					{!!Form::radio('cate', 'Imagenes')!!} Imagenes | 
					{!!Form::radio('cate', 'Vídeos')!!} Videos | 
					{!!Form::radio('cate', 'Reseñas')!!} Reseñas | 
					{!!Form::radio('cate', 'Otros')!!} Otros
				  </center>
			</div>
			{!!Form::submit('Publicar',['class'=>'btn btn-linkedin btn-block'], $secure = null)!!}
		{!!Form::close()!!}
		</article>
	@endif
@endsection