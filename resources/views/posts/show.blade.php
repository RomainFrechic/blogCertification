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

@if($post->count_comment == 0)

Pas encore de Commentaires

@else

@foreach($comments as $comment)

<h4>Commentaires posté par {{ $comment->user->username }}</h4>
<p>{{ $comment->content }}</p>

@endforeach

@endif

@stop