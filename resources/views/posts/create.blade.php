@extends('layouts.master')


@section('content')

<h2>Créer un Article</h2>

@if($post)
{{ Form::open(['route'=>['posts.addPost',0],'method'=>'post']) }}

{{csrf_field()}}

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

<div class="form-group">
		{{ Form::label('file','Image :') }}
		{{ Form::file('file',null,['class'=>'form-control']) }}
</div>
		{{ Form::submit('Publier',['class'=>'btn btn-primary']) }}
		

		{{ Form::close() }}
		
@else
{{ Form::open(['route'=>['posts.addBrouillon',0],'method'=>'post']) }}

{{csrf_field()}}

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

<div class="form-group">
		{{ Form::label('file','Image :') }}
		{{ Form::file('file',null,['class'=>'form-control']) }}
</div>
	

		
		
		{{ Form::submit('Enregistré dans Brouillon',['class'=>'btn btn-primary']) }}
		

		{{ Form::close() }}
@endif





@stop