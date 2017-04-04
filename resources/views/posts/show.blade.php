@extends('layouts.master')

@section('content')







<h2>{{ $post->name }}</h2>
<img class="card-img-top" src="{{ $post->file }}" alt="Card image cap">
<p>{{ $post->content }}</p>

<p>Posté par : {{ $author->username }} |





<!-- View count comment -->

@if($post->count_comment == 0) 

Pas de commentaires

@elseif($post->count_comment == 1)
<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
	<a href="#">Commentaires <span class="badge">1</span></a>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Commentaires</h4>
			</div>
			<div class="modal-body">



				@if($comments)

				@if(Auth::check())
				@foreach($comments as $comment)
				<div class="modal-body">
					<div class="form-group">
					<h4>{{ $comment->content }}</h4>
					<p>Commentaires posté par {{ $comment->user->username }}</p>
					</div>
				</div>
				@endforeach
				@endif
				@else

				Pas encore de Commentaires

				@endif


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>




@else

<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
	<a href="#">Commentaires <span class="badge">{{ $post->count_comment }}</span></a>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Commentaires</h4>
			</div>
			<div class="modal-body">



				@if($comments)

				@if(Auth::check())
				@foreach($comments as $comment)
				<div class="modal-body">
					<div class="form-group">
					<h4>{{ $comment->content }}</h4>
					<p style="color:blue">Commentaires posté par {{ $comment->user->username }}</p>
					</div>
				</div>
				@endforeach
				@endif
				@else

				Pas encore de Commentaires

				@endif


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>
</p>


@endif


<!-- form post comment -->

<a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Poster un commentaire</a>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Poster un commentaire</h4>
			</div>
			<div class="modal-body">

				@if(Auth::check())

				{{ Form::open(['route'=>['comments.create',$post->id],'method'=>'POST']) }}
				<div class="form-group">
					<label for="message-text" class="control-label">Message:</label>
					{{ Form::textarea('comment','',['class'=>'form-control','id'=>'message-text']) }}
				</div>
			</div>
			<div class="modal-footer">
				{{ Form::submit('Publier',['class'=>'btn btn-primary']) }}

				{{ Form::close() }}
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@else

Pour poster un commentaire Connecter vous

@endif





@stop




