@extends('layouts.principal')

@section('content')
@include('alerts.request')
	{!!Html::script('ckeditor/ckeditor.js')!!}
	<article>
	{!!Form::open(['route'=>'notice.store','method'=>'POST'])!!}
		<div class="form-group">
			<label for="" class="sr-only">Titulo</label>
			{!!Form::text('titulo', null,['class'=>'form-control', 'placeholder'=>'Titulo de la noticia'])!!}
		</div>
		<div class="form-group">
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
@endsection