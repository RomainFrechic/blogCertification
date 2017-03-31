@extends('layouts.master')


@section('content')

<table class="table table-stripped table-bordered">
	<thead>
	<tr>
		<th>Nom</th>
		<th>Email</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>

			<th>{{ $user->username }}</th>
			<th>{{ $user->email }}</th>
			<th>
		@if($user->is_admin)
		Administrateur
		@else
		Menbre
		@endif
			</th>
			<th>
			<div class="row">
			<div class="col-xs-6 col-md-4">
		{{ Form::open(['route'=>['users.permission',$user->id],'method'=>'POST']) }}

		{{csrf_field()}}

		@if($user->is_admin)
				
		{{ Form::submit('Rendre Menbre',['class'=>'btn btn-primary']) }}

		@else
		
		{{ Form::submit('Rendre Administrateur',['class'=>'btn btn-primary']) }}

		@endif
		
		{{ Form::close() }}
		</div>
		<div class="col-xs-6 col-md-4">
		{{ Form::open(['route'=>['users.delete',$user->id],'method'=>'delete']) }}

		{{ Form::submit('Suprimer',['class'=>'btn btn-danger']) }}

		{{ Form::close() }}
		</div>
		</div>
			</th>
		</tr>
		@endforeach
	</tbody>

</table>

@stop