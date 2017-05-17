<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->


    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/0a6c3266c0.js"></script>
    <script src="{{ asset('js/jquery.slides.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(function() {
            $('#slides').slidesjs({
                width: 940,
                height: 270,
                play: {
                    active: true,
                    auto: true,
                    interval: 4000,
                    swap: true,
                    stop: false
                }
            });
        });
    </script>

</head>
<body>
    <nav id="primer-menu" class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true">(0)</i></a></li>
                    <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <nav id="segundo-menu" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="navbar-header col-md-3 col-sm-3">
                    <button type="button" class="navbar-toggle collapsed col-xs-1" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand col-xs-5"></div>
                    <div class="input-group hidden-sm hidden-lg hidden-md col-xs-5" style="padding-top:10px;padding-left:7px">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs busqueda">
                    {!! Form::open(['route' => 'welcome', 'method' => 'get', 'role' => 'from']) !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </span>
                    </div>
                    {!! Form::close() !!}<!-- /input-group -->
                </div>
                <div id="navbar" class="col-md-4 col-sm-4 collapse navbar-right navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('welcome') }}">Inicio</a></li>
                        <li><a href="#about">Sobre nosotros</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- /.container -->
    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center" >
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
</body>
</html>