<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">
<link href="../../assets/css/titleArticle.css" rel="stylesheet">
<style>



</style>
</head>

    <body>


@extends('layouts.master')

@section('content')


<div class="row">
  <div class="col-xs-12 col-md-8">

<h1>{{ $post->name }}</h1>
<!-- <img class="card-img-top" src="{{ $post->file }}" alt="Card image cap"> -->
<p>{{ $post->content }}</p>

<p>Posté par : {{ $author->username }} |





<!-- View count comment -->

@if($post->count_comment == 0) 

Pas de commentaires

@elseif($post->count_comment == 1)
<!-- Button trigger modal -->
<a data-toggle="modal" data-target="#myModal" href="#">Commentaires <span class="badge">1</span></a>
</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header" style="background-color:#FF5950;">
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
					<p style="color:grey">Commentaires posté par {{ $comment->user->username }}</p>
					</div>
				</div>
				@endforeach
				@endif
				@else

				Pas encore de Commentaires

				@endif


			</div>
			<div class="modal-footer" style="background-color:#FF5950;">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>




@else

<!-- Button trigger modal -->
<a data-toggle="modal" data-target="#myModal" href="#">Commentaires <span class="badge">{{ $post->count_comment }}</span></a>
</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:#FF5950;">
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
					<p style="color:grey">Commentaires posté par {{ $comment->user->username }}</p>
					</div>
				</div>
				@endforeach
				@endif
				@else

				Pas encore de Commentaires

				@endif


			</div>
			<div class="modal-footer" style="background-color:#FF5950;">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>
</p>


@endif


<!-- form post comment -->

<a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" style="font-family: 'Arbutus', cursive;">Commenter</a>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:#FF5950;">
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
			<div class="modal-footer" style="background-color:#FF5950;">
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


</div>
</div>

<div style="height:440px"></div>
@stop

</body>


