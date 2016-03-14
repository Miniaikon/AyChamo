{!!Form::open(['route'=>'comment.store','method'=>'POST'])!!}
	{!!Form::hidden('autor', $notice->autor)!!}
	{!!Form::hidden('imagen', Auth::user()->imagen)!!}
	{!!Form::hidden('id', $notice->id)!!}
	{!!Form::hidden('cant', $notice->comment)!!}
	<div class="form-group">
		{!!Form::textarea('comentario', null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		<button id="comentar" class="btn btn-default btn-lg pull-right" data-loading-text="Comentando..." autocomplete="off" type="submit"><span class="glyphicon glyphicon-comment"></span> Comentar</button>
	</div>
{!!Form::close()!!}

<script>
  $('#comentar').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
</script>