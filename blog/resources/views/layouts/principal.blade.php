<!DOCTYPE html>
<html lang="es">
<head>
   	<meta charset="utf-8">
   	{!!Html::style('css/font-awesome.css')!!}
   	{!!Html::style('css/bootstrap.min.css')!!}
   	{!!Html::style('css/style.css')!!}
   	{!!Html::style('css/bootstrap-social.css')!!}
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>AyChamo</title>
</head>
<body>
	<div class="collapse" id="form">
	  <div class="col-md-12" id="log">
	  	<div class="col-md-6">
	  	<h1>Iniciar Sesion</h1>
	  		{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!} 
					<div class="form-group"> 
						{!!Form::label('correo','Correo:')!!}	 
						{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!} 
					</div> 
					<div class="form-group"> 
						{!!Form::label('contrasena','Contraseña:')!!}	 
						{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!} 
					</div> 
					{!!Form::submit('Iniciar',['class'=>'btn btn-primary'])!!} 
				{!!Form::close()!!} <br><br><br><br><br><br>

	  	</div><!-- Formulario -->
	  	<div class="clearfix visible-xs-block"></div>

	  	<div class="col-md-6">
	  		<h1>Registrarse</h1>

	  		{!!Form::open(['route'=>'usuario.store','method'=>'POST'])!!}
		<div class="form-group">
			{!!Form::label('Apodo:')!!}
			{!!Form::text('apodo',null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Email:')!!}
			{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Contraseña:')!!}
			{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña'])!!}
		</div>
		{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}<br><br>
	  	</div>
	  </div>
	</div><!-- Collapse -->
	<div class="clearfix visible-md-block visible-xs-block"></div>

	<div class="col-md-12 text-right" id="barra">
	<span style="font-size: 24px; color:#fff;">
	@if(Auth::user())
            <a href="/profile" style="color:#34495e;text-decoration:none;font-size: 16px;"> 
                <strong>{!!Auth::user()->apodo!!}<i class="fa fa-user fa-fw"></i> 
            </a> |
            <a style="color:#34495e;text-decoration:none;font-size: 16px;" href="{!!URL::to('/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </strong>
            
		@else
		
		<a class="btn btn-text" style="color:#34495e;" role="button" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="collapseExample">
  			<strong>Login/Register</strong>
		</a>
		@endif
		
		<a style="color:#fff;" href="#"><span class="fa fa-twitter"></span></a> 
		<a style="color:#fff;" href="#"><span class="fa fa-facebook"></span></a> 
		<a style="color:#fff;" href="#"><span class="fa fa-google"></span></a>
		</span>
	</div>
	<header class="col-md-12 container">
		<div class="col-md-4">
			<a href="/"><img width="100%" src="../../img/logo.png" alt=""></a>
		</div>
		<div class="col-md-8">
			<img class="thumbnail" src="../../img/add.png" style="width:90%; height:90%; align:center; margin-top:5%; margin-left:5%" alt="">
		</div>
	</header>

	<div class="row container" style="margin-left: auto;margin-right: auto;display:block;">

		<section class="col-md-8">
			@if(Auth::user())
				@if((Auth::user()->nivel == 1) || (Auth::user()->nivel == 2))
					<div class="col-md-12" id="menu">
						<a href="/notice" class="btn btn-pinterest" title="Ver lista de publicaciones"><span class="glyphicon glyphicon-list-alt"></span> Ver en lista</a>
						<a href="/notice/create" class="btn btn-instagram" title="Nuevo articulo"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
						@if(Auth::user()->nivel == 2)
							<a href="/admin" class="btn btn-google"><span class="glyphicon glyphicon-user"></span> Usuarios</a>
						@endif
					</div><br><hr>
				@endif
			@endif

			@include('alerts.errors')
			@include('alerts.request')
			@include('alerts.success')
			@yield('content')
		</section>

		<aside class="col-md-4">
			<div class="input-group input-group-lg">
		      <input type="text" class="form-control" placeholder="Search for...">
		      <span class="input-group-btn">
		        <button class="btn btn-vimeo" type="button">Buscar</button>
		      </span>
		    </div><br><br><!-- /input-group -->
			
			@if(Auth::user())
		    <article>
		    	<center>
					<span style="font-size:24px;">{!!Auth::user()->apodo!!}<span><br>
		    		<img width="70%" class="img-thumbnail img-responsive" src="../../fotos/{!!Auth::user()->imagen!!}" alt="">
		    </center>
				<center><a  class="btn btn-warning btn-xs" href="profile/photo"><span class="glyphicon glyphicon-picture"></span> Cambiar foto</a></center><hr>
				<center><a class="btn btn-default" href="profile"><span class="glyphicon glyphicon-user"></span> Ir a mi perfil</a></center>
		    </article><br><br>
		    @endif

		    <article>
		    	<h4>Categorías</h4><hr>
				<ul class="nav nav-stacked">
				  <li><a href="/noticia" class="list-group-item">Noticia</a></li>
				  <li><a href="/humor" class="list-group-item">Humor</a></li>
				  <li><a href="/video" class="list-group-item">Vídeos</a></li>
				  <li><a href="/imagen" class="list-group-item">Imagenes</a></li>
				  <li><a href="/resena" class="list-group-item">Reseñas</a></li>
				  <li><a href="/otro" class="list-group-item">Otros</a></li>
				</ul>
		    </article><br><br><!-- Categorías -->

		    
		</aside>
	</div><br><br><br><br>
	<footer class="col-md-12" style="background: #1AB7EA;">
		<center>
			Copyright 2015&copy | Derechos de desarrollo reservados a Ysmael Clemente
		</center>
	</footer>

{!!Html::script('js/jquery-1.12.0.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
</body>
</html>