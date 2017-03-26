@extends('layouts.master')


@section('content')

			

  {{ Form::open(['route'=>'users.check']) }}


  <div class="form-group">
  	
		{{ Form::text('username','',['placeholder'=>'username','class'=>'form-control']) }}

		@if($errors->first('username'))
			<div class="alert alert-danger">
				{{ $errors->first('username') }}
			</div>	
		@endif

  </div>

   <div class="form-group">
  	
		{{ Form::password('password',['placeholder'=>'password','class'=>'form-control']) }}

		@if($errors->first('password'))
			<div class="alert alert-danger">
				{{ $errors->first('password') }}
			</div>	
		@endif

  </div>

   <div class="form-group">
  	
		{{ Form::checkbox('remenber', 'remenber', false) }}
		{{ Form::label('remenber', 'Se souvenir de moi') }}


  </div>

        {{ Form::submit('Se Connecter',['class'=>'btn btn-primary']) }}

  {{ Form::close() }}



@stop