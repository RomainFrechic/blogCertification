@extends('layouts.master')


@section('content')

<table class="table table-stripped table-bordered">
	<thead>
	<tr>
		<th>Nom</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>

			<th>{{ $user->username }}</th>

			<th>
		@if($user->is_admin)
		Administrateur
		@else
		Menbre
		@endif
			</th>
			<th>
		{{ Form::open(['route'=>['users.permission',$user->id],'method'=>'POST']) }}

		@if($user->is_admin)
				
		{{ Form::submit('Rendre Menbre',['class'=>'btn btn-primary']) }}

		@else
		
		{{ Form::submit('Rendre Administrateur',['class'=>'btn btn-primary']) }}

		@endif
		
		{{ Form::close() }}

		{{ Form::open(['route'=>['users.delete',$user->id],'method'=>'delete']) }}

		{{ Form::submit('Suprimer',['class'=>'btn btn-danger']) }}

		{{ Form::close() }}
			</th>
		</tr>
		@endforeach
	</tbody>

</table>

@stop