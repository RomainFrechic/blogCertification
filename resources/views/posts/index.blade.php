@extends('layouts.master')

@section('content')

<h1>La liste des Articles</h1>

@foreach($posts as $post)


<div class="row">
	<div class="col-md-4">
		<a href="{{ URL::route('posts.show', $post->slug)}}">
			<h2>{{ $post->name }}</h2>
		</a>
		<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		<p><a class="btn btn-default" href="{{ URL::route('posts.show', $post->slug)}}" role="button">View details &raquo;</a></p>
	</div>



	@endforeach  

<div>
	
	{{ $posts->links() }}
	
</div>	

	@stop