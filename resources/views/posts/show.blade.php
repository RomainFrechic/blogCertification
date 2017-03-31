@extends('layouts.master')

@section('content')


<h2>{{ $post->name }}</h2>
<img class="card-img-top" src="{{ $post->file }}" alt="Card image cap">
<p>{{ $post->content }}</p>

<p>Posté par : {{ $author->username }} | 

	@if($post->count_comment == 0) 

	Pas de commentaires

	@elseif($post->count_comment == 1)
	<a href="#">Commentaires <span class="badge">1</span></a>
	

	@else
	<a href="#">Commentaires <span class="badge">{{ $post->count_comment }}</span></a>
	@endif
</p>

@if($comments)

@if(Auth::check())
@foreach($comments as $comment)

	{{ Form::open(['route'=>['comments.delete',$comment->id],'method'=>'delete']) }}

	{{csrf_field()}}

<h4>Commentaires posté par {{ $comment->user->username }}</h4>
<p>{{ $comment->content }}</p>

	{{ Form::submit('Supprimer',['class'=>'btn btn-danger']) }}

	{{ Form::close() }}

@endforeach
@endif
@else

Pas encore de Commentaires

@endif

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class="caption">
				<h3>Poster un commentaire</h3>

				@if(Auth::check())

				{{ Form::open(['route'=>['comments.create',$post->id],'method'=>'POST']) }}
				<div class="form-group">
					{{ Form::text('comment','',['class'=>'form-control']) }}
				</div>

				{{ Form::submit('Publier',['class'=>'btn btn-primary']) }}

				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>
@else

Pour poster un commentaire <a href="{{ URL::route('users.login') }}">Connecter vous</a>

@endif


@stop




