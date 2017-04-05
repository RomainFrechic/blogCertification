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

  <title>Blog Romain</title>

  <link href="https://fonts.googleapis.com/css?family=Rock+Salt" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ruthie" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Arbutus" rel="stylesheet">
  <!-- semantic ui css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">


  <!-- Bootstrap core CSS -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
  rel="stylesheet">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">
  
  <link href='http://fonts.googleapis.com/css?family=Sansita+One' rel='stylesheet'>

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>

        body {
          
          background-color:#E7E7E7;

        }


        h1{
          font-family: 'Bungee Shade', cursive;
        }

        p{
         font-family: 'Arbutus', cursive;
       }

       h3{
         font-family: 'Arbutus', cursive;
       }

       h1:after {
        color: #d6d6d6;
        text-shadow: 0 1px 0 white;
      }

      li {
        color: #403F38;
        font: 22px 'LeagueGothicRegular';
        list-style: none;
      }

      li:hover{
        color:white;
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
        
      }


    </style>

  </head>

  <body>

    <nav class="navbar navbar-inverse" style="background-color:#9E6A45;">

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            
            <span class="icon-bar"></span>
            
            <span class="icon-bar"></span>
            
            <span class="icon-bar"></span>
            
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

           <li> <a class="navbar-brand" href="{{ URL::route('home') }}" style="font-family: 'Arbutus', cursive; color: #403F38;">ACCEUIL</a></li>

           <li> <a class="navbar-brand" href="{{ URL::route('layouts.acceuil') }}" style="font-family: 'Arbutus', cursive; color: #403F38;">ARTICLE</a></li>

           @if(Auth::check())

           @if(Auth::user()->is_admin)

           <li><a href="{{ URL::route('home.admin') }}" style="font-family: 'Arbutus', cursive; color: #403F38;">ADMINISTRATION</a></li>

           @endif

           <li class="pull-right"><a href="{{ URL::route('users.logout') }}" style="font-family: 'Arbutus', cursive; color: #403F38;">SE DECONNECTER</a></li>

           @else

           

           <li><a href="{{ URL::route('users.register') }}" style="font-family: 'Arbutus', cursive; color: #403F38;">CREER UN COMPTE</a></li>


           @endif

         </ul>
         @if(!Auth::check())
         <div id="navbar" class="navbar-collapse collapse">

          {{ Form::open(['route'=>'users.checkTwo','class'=>'navbar-form navbar-right']) }}

          {{csrf_field()}}

          <div class="form-group">

            {{ Form::email('email','',['placeholder'=>'email','class'=>'form-control']) }}
            {{csrf_field()}}
            @if($errors->first('email'))
            <div class="alert alert-danger">
              {{ $errors->first('email') }}
            </div>  
            @endif

          </div>

          <div class="form-group">

            {{ Form::password('password',['placeholder'=>'password','class'=>'form-control']) }}
            {{csrf_field()}}
            @if($errors->first('password'))
            <div class="alert alert-danger">
              {{ $errors->first('password') }}
            </div>  
            @endif

          </div>

          {{ Form::submit('Se Connecter',['class'=>'btn btn-default']) }}

          {{ Form::close() }}

        </div><!--/.nav-collapse-->
        @else

        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            <div class="form-group">


              <div ><li style="color:#403F38;"><span class="glyphicon glyphicon-user"></span></li> </div>



            </div>
          </div>
        </div>
        @endif

      </div>
    </div>
  </nav>
  
  <div class="container">

    <!-- Gestion des message d'erreur dans le dossier layouts-->
    @if(Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif 

    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif 

    
    
    @yield('content')


  </div>






  


  @include('parts.footer')


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>

