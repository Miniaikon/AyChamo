@foreach($comments as $comment)
<article>
	<div class="row">
		<div class="col-md-4">
			<img width="100%" class="img-thumbnail" src="../../fotos/{!!$comment->imagen!!}">
		</div>
		<div class="col-md-8">
			<span style="color: blue; font-size: 24px;">{!!$comment->autor!!}</span>
			<small>{!!$comment->created_at!!}</small><hr>
			<p>{!!$comment->comentario!!}</p>
		</div>
	</div>
</article><br><br>	
@endforeach