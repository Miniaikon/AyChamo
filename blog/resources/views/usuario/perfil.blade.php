@extends('layouts.principal')

@section('content') 
	<article>
		<div class="row">
			<div class="col-md-5">
				<a href="profile/photo"><span class="glyphicon glyphicon-picture"></span> Subir foto</a>
				<img class="img-thumbnail img-responsive" src="../../img/users/{!!Auth::user()->imagen!!}" alt="">
			</div>
			<div class="col-md-7">
				<address>
				  <h3>{!!Auth::user()->name!!}</h3><br>
				  <strong>Direción e-mail:</strong> {!!Auth::user()->email!!}<br>
				  <strong>Fecha d registro:</strong> {!!Auth::user()->created_at!!}<br>
				</address>
			</div>
		</div>
	</article>
@endsection