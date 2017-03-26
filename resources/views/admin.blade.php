@extends('layouts.master')


@section('content')


<a href="{{ URL::route('posts.admin') }}">Modifier les postes</a><br>
<a href="{{ URL::route('comments.admin' )}}">Supprimer des commentaires</a><br>
<a href="{{ URL::route('users.admin' )}}">Gérer les utilisateurs</a>


@stop