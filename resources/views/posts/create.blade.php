@extends('layouts.master')


@section('content')

<h2>Créer un Article</h2>

{{ Form::open(['route'=>['posts.update',0],'method'=>'post']) }}

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
		{{ Form::submit('Publier',['class'=>'btn btn-primary']) }}
		{{ Form::close() }}

		
		






@stop