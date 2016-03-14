<!DOCTYPE html>
<html>
<head>
	<title>Subir imagen</title>
	{!!Html::style('../css/font-awesome.css')!!}
   	{!!Html::style('../css/bootstrap.min.css')!!}
   	{!!Html::style('css/estilos.css')!!}
   	{!!Html::style('../css/bootstrap-social.css')!!}
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<h3>Suba su imagen</h3>
	<div id="preview" class="thumbnail">
		<a href="#" class="btn btn-default" id="file-select">Elegir archivo</a>
		<img src="fotos/default.png" alt="">
	</div>
	<span class="alert alert-info" id="file-info">No hay archivo aun.</span>
	
	<form action="/store" method="post" id="file_submit" enctype="multipart/form-data">
		
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="file" name="filename" id="filename">
		<input type="submit" value="Guardar" class="bnt btn-primary" id="file-save">

	</form>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message') }}</div>
	@endif

	<div id="files-uploaded">
		<h4>Imágenes subidas</h4>
		<ul>
		<?php $cont = 0; ?>
			<!-- Foreach -->
			@foreach($images as $image)
			<?php $cont = $cont + 1; ?>
			<li tittle="{{ basename($image) }}">
					<img src="{{ $image }}" id="imagen"  alt="">
					<b id="info" style="display: none;">{{ $image }}</b>
				<span>
					<a href="#" data-toggle="modal" data-target="#<?php echo $cont; ?>" tittle="Ver">
						<span class="glyphicon glyphicon-eye-open"></span>
					</a>
					<a href="{{ url('destroy',basename($image)) }}" tittle="Eliminar">
						<span class="glyphicon glyphicon-remove"></span>
					</a>
				</span>
			</li>

			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="Mimodal" id="<?php echo $cont; ?>">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<img style="max-width:500px;" src="{{ $image }}" class="img img-thumbnail" alt="Imagen"><br>
			      <a class="form-control" disabled>
			      	http://www.aychamo.com.ve/{{ $image }}
			      </a>
			    </div>
			  </div>
			</div>
			@endforeach
		</ul>
	</div>

	{!!Html::script('js/jquery-1.12.0.min.js')!!}
	{!!Html::script('js/up.min.js')!!}
	{!!Html::script('js/bootstrap.min.js')!!}
</body>
</html>

