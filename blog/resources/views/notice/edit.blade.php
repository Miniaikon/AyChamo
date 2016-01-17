@extends('layouts.principal')

@section('content')
@include('alerts.request')
	{!!Html::script('ckeditor/ckeditor.js')!!}
	{!!Form::model($notice,['route'=>['notice.update',$notice->id],'method'=>'PUT'])!!}
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
			<label for="" class="sr-only">Autor</label>
			{!!Form::text('autor', null,['class'=>'form-control', 'placeholder'=>'autor'])!!}
		</div>
		{!!Form::submit('Publicar',['class'=>'btn btn-linkedin btn-block'], $secure = null)!!}
	{!!Form::close()!!}
@endsection