@extends('layouts.master')


@section('content')


<a href="{{ URL::route('posts.admin') }}">Modifier les postes</a>
<a href="{{ URL::route('comments.admin' )}}">Supprimer des commentaires</a>


@stop