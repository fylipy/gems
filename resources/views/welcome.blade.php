@extends('layouts.web')

@section('content')
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
                    @foreach($categories as $c)
                    <a href="{{route('categories.showProducts', [$c->id])}}" class="list-group-item">{{ $c->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-md-10">
                <div class="row">
                    @foreach($products as $p)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="@if($p->getFirstImage()) {{ asset('images/'.$p->getFirstImage()->original_name) }} @else {{ asset('images/default_image.jpg') }} @endif" alt="" style="widht:285px; height: 160px">
                            <div class="caption">
                                <h4 class="pull-right">$ {{ $p->price }}</h4>
                                <h4><a href="{{ route('showProduct', [$p->id]) }}">{{ $p->title }}</a></h4>
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
                </div>
            </div>

        </div>

    </div>
@endsection
