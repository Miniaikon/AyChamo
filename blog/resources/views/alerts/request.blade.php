@if(count($errors) > 0)
	<div class="alert alert-warning alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  	@foreach($errors->all() as $error)
			<li>{!!$error!!}</li>
	  	@endforeach
	  </div>
@endif