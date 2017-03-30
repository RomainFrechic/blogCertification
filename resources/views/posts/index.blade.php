@extends('layouts.master')

@section('content')

<h1>La liste des Articles</h1>

@foreach($posts as $post)


<div class="row">
	<div class="col-md-4">
		<a href="{{ URL::route('posts.show', $post->slug)}}">
			<h2>{{ $post->name }}</h2>
		</a>
		<p>{{ $post->content }} </p>
		<p><a class="btn btn-default" href="{{ URL::route('posts.show', $post->slug)}}" role="button">View details &raquo;</a></p>
	</div>



	@endforeach  

<div>
	
	{{ $posts->links() }}
	
</div>	

	@stop