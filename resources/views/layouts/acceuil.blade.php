<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Off Canvas Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
  rel="stylesheet">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
  <style>
    body {
          color:black;
          background-color:#E0E3DA;

        }


        h1 {
          position: relative;
          font-size: 70px;
          margin-top: 0;
          font-family: 'Lobster', helvetica, arial;
        }

        h1 a {
          text-decoration: none;
          color: #666;
          position: absolute;

          -webkit-mask-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,1)), color-stop(50%, rgba(0,0,0,.5)), to(rgba(0,0,0,1)));
        }

        h1:after {
          color: #d6d6d6;
          text-shadow: 0 1px 0 white;
        }

        li {
          color: black;
          font: 22px 'LeagueGothicRegular';
          list-style: none;
        }

        li::hover{
          color: white;
        }


  </style>

  </head>

  <body>
<nav class="navbar navbar-inverse" style="background-color:#9E6A45;">

        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

             <li> <a class="navbar-brand" href="{{ URL::route('home') }}">ACCEUIL</a></li>

             <li> <a class="navbar-brand" href="{{ URL::route('layouts.acceuil') }}">ARTICLE</a></li>

             @if(Auth::check())

             @if(Auth::user()->is_admin)

             <li><a href="{{ URL::route('home.admin') }}">ADMINISTRATION</a></li>

             @endif

             <li class="pull-right"><a href="{{ URL::route('users.logout') }}">SE DECONNECTER</a></li>

             @else

             

             <li><a href="{{ URL::route('users.register') }}">CREER UN COMPTE</a></li>


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

            {{ Form::submit('Se Connecter',['class'=>'btn btn-success']) }}

            {{ Form::close() }}

          </div><!--/.nav-collapse-->
          @else

          <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
              <div class="form-group">
                <div ><li style="color:black;"><span class="glyphicon glyphicon-user"></span></li> </div>
              </div>
            </div>
          </div>

          @endif

        </div>
      </div>
    </nav>
    

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
         
          <div class="jumbotron">
            <h1>The Code, is Awesome!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div>
          <div class="row">
            <div class="col-6 col-lg-4">
              <h2>React.js</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="http://reactjs.cn/react/docs/getting-started.html" role="button">Voir les détails &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Laravel</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="https://laravel.com/" role="button">Voir les détails &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Symfony</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="http://symfony.com/doc/current/index.html" role="button">Voir les détails &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Ruby on Rails</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="http://guides.rubyonrails.org/" role="button">Voir les détails &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Magento</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="https://magento.com/resources/technical" role="button">Voir les détails &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Bootstrap</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-secondary" href="http://getbootstrap.com/" role="button">Voir les détails &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Liens Projets</a>
            <a href="https://news.simplon.me/" class="list-group-item">Simplon News</a>
            <a href="http://blog.occ.simplon.co/" class="list-group-item">Blog Simplon</a>
            <a href="http://simplon.co/" class="list-group-item">Simplon.co</a>
            <a href="https://romainfrechic.github.io/progressive-web-app/#/" class="list-group-item">Intessens</a>
            <a href="https://romainfrechic.github.io/To-Do-List/" class="list-group-item">To do list</a>
            <a href="https://github.com/RomainFrechic?page=2&tab=repositories" class="list-group-item">Github Romain fréchic</a>
            <a href="#" class="list-group-item">Code Plus</a>
            <a href="https://stackoverflow.com/" class="list-group-item">Stackoverflow</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2017</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
