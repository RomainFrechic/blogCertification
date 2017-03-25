@extends('layouts.master')

@section('content')

{{ Form::open(['route'=>'users.store']) }}

<div class="form-groupe">
	{{ Form::label('email','Email') }}
	{{ Form::text('email','',['class'=>'form-control']) }}

	@if($errors->first('email'))
		<div class="alert alert-danger">{{ $errors->first('email') }}</div>
	@endif
	
</div>


<div class="form-groupe">
	{{ Form::label('username','Pseudo') }}
	{{ Form::text('username','',['class'=>'form-control']) }}

	@if($errors->first('username'))
		<div class="alert alert-danger">{{ $errors->first('username') }}</div>
	@endif
	
</div>


   <div class="form-group">
  		{{ Form::label('password','Mot de Passe') }}

		{{ Form::password('password',['class'=>'form-control']) }}

		@if($errors->first('password'))
			<div class="alert alert-danger">
				{{ $errors->first('password') }}
			</div>	
		@endif

  </div>

  <div class="form-group">
  		{{ Form::label('password_confirm','Confirmer Mot de Passe') }}

		{{ Form::password('password_confirm',['class'=>'form-control']) }}

		@if($errors->first('password_confirm'))
			<div class="alert alert-danger">
				{{ $errors->first('password_confirm') }}
			</div>	
		@endif

  </div>

   
    {{ Form::submit('S\'enregistrer',['class'=>'btn btn-primary']) }}



{{ Form::close() }}



@stop