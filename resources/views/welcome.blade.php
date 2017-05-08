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
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
              </span>
                    </div><!-- /input-group -->
                </div>
                <div id="navbar" class="col-md-4 col-sm-4 collapse navbar-right navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio</a></li>
                        <li><a href="#about">Sobre nosotros</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div></div>
    </nav>
    <div class="row carousel-holder">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="slide-image" src="{{ asset('images/slide1.jpg') }}" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="{{ asset('images/slide2.jpg') }}" alt="">
                    </div>

                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    <br>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                <p class="lead">Categorías</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Categoría 1</a>
                    <a href="#" class="list-group-item">Categoría 2</a>
                    <a href="#" class="list-group-item">Categoría 3</a>
                </div>
            </div>

            <div class="col-md-10">


                <div class="row">
                    @foreach($products as $p)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="@if($p->getFirstImage()) {{ asset('images/'.$p->getFirstImage()->original_name) }} @else {{ asset('images/default_image.jpg') }} @endif" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$ {{ $p->price }}</h4>
                                <h4><a href="#">{{ $p->title }}</a>
                                </h4>
                                <p>{{ $p->content }}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">31 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ asset('images/slide2.jpg') }}" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$94.99</h4>
                                <h4><a href="#">Fifth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
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
