@extends('layouts.master')


@section('content')

<style>
	body {
          color:black;
          background-color:white;

        }
</style>

<a href="{{ URL::route('posts.admin') }}">Modifier les postes</a><br>
<a href="{{ URL::route('comments.admin' )}}">Supprimer des commentaires</a><br>
<a href="{{ URL::route('users.admin' )}}">Gérer les utilisateurs</a>

<div style="height:540px"></div>
@stop