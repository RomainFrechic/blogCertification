@foreach($posts as $post)


<div class="row">
	<div class="col-md-4">
		<h3>{{  $post->slug)}}"></h3>
			<h2>{{ $post->name }}</h2>
		</a>
		<p>{{ $post->content }} </p>
		
	</div>



	@endforeach  




	{{ Form::open(['route'=>['posts.brouillon'],'method'=>'post']) }}
		{{ Form::submit('Enregistrer dans brouillon', ['class'=>'btn btn-info']) }}
		{{ Form::close() }}