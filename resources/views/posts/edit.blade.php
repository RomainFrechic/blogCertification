@extends('layouts.master')


@section('content')

<div style="font-family: 'Arbutus', cursive;">
	{{ Form::open(['route'=>['posts.update',$post->id],'method'=>'post']) }}

	{{csrf_field()}}

	<div class="form-group">
		
		{{ Form::label('name','Nom :') }}
		{{ Form::text('name',$post->name,['class'=>'form-control']) }}
		@if($errors->first('name'))
		<div class="alert alert-danger">{{ $errors->first('name') }}</div>
		@endif		
	</div>

	<div class="form-group">
		{{ Form::label('content','Contenu :') }}
		{{ Form::textarea('content',$post->content,
		['class'=>'form-control']) }}
		@if($errors->first('content'))
		<div class="alert alert-danger">{{ $errors->first('content') }}</div>
		@endif

	</div>
	{{ Form::submit('Modifier',['class'=>'btn btn-primary']) }}



	{{ Form::close() }}

</div>
@stop