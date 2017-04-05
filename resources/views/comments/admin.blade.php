@extends('layouts.master')


@section('content')

<style>
	body {
		color:black;
		background-color:white;

	}
</style>


<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th>Post</th>
			<th>Nom</th>
			<th>Commentaires</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($comments as $comment)
		<tr>
			<th>{{ $comment->post->slug }}</th></th>
			<th>{{ $comment->user->username }}</th>
			<th>{{ $comment->content }}</th>
			<th>
				{{ Form::open(['route'=>['comments.delete',$comment->id],'method'=>'delete']) }}

				{{ Form::submit('Supprimer',['class'=>'btn btn-danger']) }}

				{{ Form::close() }}
			</th>
		</tr>
		@endforeach
	</tbody>

</table>


<div style="height:440px"></div>

@stop