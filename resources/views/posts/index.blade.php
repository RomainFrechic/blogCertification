@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Article</title>

  <!-- Bootstrap core CSS -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  
  <style>
    .rotate{
     box-shadow:2px 2px grey;
   }
 </style>
</head>

@section('content')

<div class="row">
  
</div>



<div class="row">
  @foreach($posts as $post)

  <div class="rotate">
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail" style="background-color:#9E6A45" style="width:200px" style="height:200px">
        <!--<img src="{{ $post->file }}"  alt="...">-->
        <div class="caption">
          <h3>{{ $post->name }}</h3>
          <p>{{ $post->content }}</p>
          <p><a class="btn btn-default" href="{{ URL::route('posts.show', $post->slug)}}" role="button">Lire la suite &raquo;</a></p>
        </div>
      </div>
    </div>
  </div>

  
  @endforeach  
</div>


{{ $posts->links() }}



@stop



   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
   <script src="../../dist/js/bootstrap.min.js"></script>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 </body>
 </html>
