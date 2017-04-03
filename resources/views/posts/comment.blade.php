@extends('layouts.master')


@section('content')


<h3>Les Commentaires</h3>
<a href="#">Commentaire <span class="badge">{{ $post->count_comment }}</span></a>
@if($comments)

@if(Auth::check())
@foreach($comments as $comment)


<h4>Commentaires posté par {{ $comment->user->username }}</h4>
<p>{{ $comment->content }}</p>







@endforeach
@endif
@else

Pas encore de Commentaires

@endif


@stop