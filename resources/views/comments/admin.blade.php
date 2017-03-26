@extends('layouts.master')


@section('content')

<table class="table table-stripped table-bordered">
	<thead>
	<tr>
		<th>Commentaires</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
		@foreach($comments as $comment)
		<tr>
			<th>{{ $comment->content }}</th>
			<th>
				{{ Form::open(['route'=>['comments.delete',$comment->id],'method'=>'delete']) }}

				{{ Form::submit('X',['class'=>'btn btn-danger']) }}

				{{ Form::close() }}
			</th>
		</tr>
		@endforeach
	</tbody>

</table>

@stop