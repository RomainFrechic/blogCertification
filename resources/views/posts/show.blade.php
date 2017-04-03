@extends('layouts.master')

@section('content')







<h2>{{ $post->name }}</h2>
<img class="card-img-top" src="{{ $post->file }}" alt="Card image cap">
<p>{{ $post->content }}</p>

<p>Posté par : {{ $author->username }} | 

	@if($post->count_comment == 0) 

	Pas de commentaires

	@elseif($post->count_comment == 1)
	<a href="#">Commentaires <span class="badge">1</span></a>


	

	@else

<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
  <a href="#">Commentaires <span class="badge">{{ $post->count_comment }}</span></a>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

	
	<a href="#">Commentaires <span class="badge">{{ $post->count_comment }}</span></a>
	@endif
</p>


<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class="caption">

@if($comments)

@if(Auth::check())
@foreach($comments as $comment)

	
<h4>{{ $comment->content }}</h4>
<p>Commentaires posté par {{ $comment->user->username }}</p>


@endforeach
@endif
@else

Pas encore de Commentaires

@endif


			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class="caption">
				<h3>Poster un commentaire</h3>

				@if(Auth::check())

				{{ Form::open(['route'=>['comments.create',$post->id],'method'=>'POST']) }}
				<div class="form-group">
					{{ Form::text('comment','',['class'=>'form-control']) }}
				</div>

				{{ Form::submit('Publier',['class'=>'btn btn-primary']) }}

				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>
@else

Pour poster un commentaire <a href="{{ URL::route('users.login') }}">Connecter vous</a>

@endif


@stop




