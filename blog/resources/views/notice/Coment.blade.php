@foreach($comments as $comment)
<article>
	<div class="row">
		<div class="col-md-4">
			<img width="100%" class="img-thumbnail" src="../../fotos/{!!$comment->imagen!!}">
		</div>
		<div class="col-md-8">
			<span style="color: blue; font-size: 24px;">{!!$comment->autor!!} {!!$comment->id!!}</span>
			<small>{!!$comment->created_at!!}</small> 
			@if(Auth::user()->nivel == 1 || Auth::user()->nivel == 2)
			{!!Form::open(['route' => ['comment.destroy',$comment->id], 'method'=>'PUT'])!!}
			{!!Form::hidden('cantidad', $comentario)!!}
				<button class="btn btn-danger pull-right" style="position: absolute;" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
			
			{!!Form::close()!!}
			@endif
			<hr>
			<p>{!!$comment->comentario!!}</p>
		</div>
	</div>
</article><br><br>	
@endforeach