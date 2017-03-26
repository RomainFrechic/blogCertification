@extends('layouts.master')


@section('content')

{{ Form::open(['route'=>['posts.update',$post->id],'method'=>'post']) }}

	<div class="form-group">
		
		{{ Form::label('name','Nom :') }}
		{{ Form::text('name','',['class'=>'form-control']) }}
		@if($errors->first('name'))
			<div class="alert alert-danger">{{ $errors->first('name') }}</div>
		@endif		
	</div>

<div class="form-group">
		{{ Form::label('content','Contenu :') }}
		{{ Form::textarea('content','',
		['class'=>'form-control']) }}
		@if($errors->first('content'))
			<div class="alert alert-danger">{{ $errors->first('content') }}</div>
		@endif

</div>
		{{ Form::submit('Envoyer',['class'=>'btn btn-primary']) }}




{{ Form::close() }}

@stop