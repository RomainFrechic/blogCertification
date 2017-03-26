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

@foreach($comments as $comment)

	<h4>Commentaires posté par {{ $comment->user->username }}</h4>
	<p>{{ $comment->content }}</p>

@endforeach

@else

	Pas encore de Commentaires

@endif

<h2>Poster un commentaire</h2>

@if(Auth::check())

{{ Form::open(['route'=>['comments.create',$post->id],'method'=>'POST']) }}
	<div class="form-group">
		{{ Form::text('comment','',['class'=>'form-control']) }}
	</div>

	{{ Form::submit('Envoyer',['class'=>'btn btn-primary']) }}

{{ Form::close() }}

@else

Pour poster un commentaire <a href="{{ URL::route('users.login') }}">Connecter vous</a>

@endif

@stop
