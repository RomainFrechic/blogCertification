@extends('layouts.master')


@section('content')


<h3>Les Commentaires</h3>
<a href="#">Commentaire <span class="badge">{{ $post->count_comment }}</span></a>
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


@stop