@extends('layouts.master')


@section('content')

<style>
	body {
		color:black;
		background-color:white;

	}
</style>


<h2>Listes des Articles</h2>&nbsp;<a class="btn btn-success" href="{{ URL::route('posts.create') }}">Ajouter un Article</a>

<table class="table table-stripped table-bordered">
	
	<thead>
		<tr>
			
			<th>ID</th>
			<th>Nom</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@foreach($posts as $post)
		<tr>
			<th>{{ $post->id }}</th>
			<th>{{ $post->name }}</th>
			<th>
				<div class="row">
					<div class="col-xs-6 col-md-2">
						<a class="btn btn-info" href="{{ URL::route('posts.edit',$post->id) }}"> Modifer</a>&nbsp;
					</div>
					<div class="col-xs-6 col-md-2">
						{{ Form::open(['route'=>['posts.delete',$post->id],'method'=>'delete']) }}
						{{ Form::submit('suprimer', ['class'=>'btn btn-danger']) }}
						{{ Form::close() }}
					</div>
				</th>
			</tr>
			@endforeach
		</tbody>


	</table>


	@stop