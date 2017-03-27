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

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}">Project name</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">


              @if(Auth::check())
              
              @if(Auth::user()->is_admin)

              <li><a href="{{ URL::route('home.admin') }}">Administration</a></li>

              @endif

              <li class="pull-right"><a href="{{ URL::route('users.logout') }}">Se Déconnecter</a></li>

              @else

              <li><a href="{{ URL::route('users.login') }}">Se Connecter</a></li>

              <li><a href="{{ URL::route('users.register') }}">Créer un Compte</a></li>
              

              @endif

            </ul>
            @if(!Auth::check())
            <div id="navbar" class="navbar-collapse collapse">

              {{ Form::open(['route'=>'users.checkTwo','class'=>'navbar-form navbar-right']) }}


              <div class="form-group">

                {{ Form::email('email','',['placeholder'=>'email','class'=>'form-control']) }}

                @if($errors->first('email'))
                <div class="alert alert-danger">
                  {{ $errors->first('email') }}
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

              {{ Form::submit('Se Connecter',['class'=>'btn btn-success']) }}

              {{ Form::close() }}

            </div><!--/.nav-collapse-->
            @else

            <div id="navbar" class="navbar-collapse collapse">
              <div class="navbar-form navbar-right">
                <div class="form-group">
                    
                  <img src="https://unsplash.com/?photo=BO5BswJwguI" alt="..." class="img-circle">
                    
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
        
        <!-- @if(Auth::check())
        @if(Auth::user()->is_admin)
        <div class="alert alert-success">Vous êtes administrateur</div>
        @else
        <div class="alert alert-danger">Vous n'avez pas les droits d'administration</div>
        @endif
        @else
        <div class="alert alert-danger">Vous n'êtes pas authentifié</div>
        @endif -->

       
        @yield('content')

      </div><!-- /.container -->







      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Main jumbotron for a primary marketing message or call to action -->
     

      

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>



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

