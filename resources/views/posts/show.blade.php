@extends('layouts.master')

@section('content')


<h2>{{ $post->name }}</h2>
<p>Posté par : {{ $author->username }} | 

	@if($post->count_comment == 0) 

	Pas de commentaires

	@elseif($post->count_comment == 1)

	1 Commentaire

	@else

	{{ $post->count_comment }} Commentaires
	@endif
</p>


<p>{{ $post->content }}</p>

<h3>Les Commentaires</h3>

@if($comments)

@if(Auth::check())
@foreach($comments as $comment)

	{{ Form::open(['route'=>['comments.delete',$comment->id],'method'=>'delete']) }}

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
				<h2>Poster un commentaire</h2>

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




