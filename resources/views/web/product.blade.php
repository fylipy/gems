@extends('layouts.web')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="text-center col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ route('welcome') }}">Inicio</a></li>
                    <li><a href="{{ route('categories.showProducts', [$product->category->id]) }}">{{ $product->category->name }}</a></li>
                    <li><a href="{{ route('showProduct', $product->id) }}">{{ $product->title }}</a></li>
                </ul>
            </div>
        </div>
        <div class="row ficha">
            <div class="col-md-8">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i=0; $i<count($product->images);$i++)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="@if($i==0) active @endif"></li>
                                @endfor
                            </ol>
                            <div class="carousel-inner">
                                @if($product->images)
                                    @foreach($product->images as $image)
                                        <div class="@if($image==$product->getFirstImage()) item active @else item @endif">
                                        <img class="slide-image" src="{{ asset('images/'.$image->original_name) }}" alt="" style="widht:800px; height: 300px">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="item">
                                        <img class="slide-image" src="{{ asset('images/default_image.jpg') }}" alt="">
                                    </div>
                                @endif
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
            </div>

            <div class="col-md-4">
                <div class="col-md-12"><h2 class="prod-nombre">{{ $product->title }}</h2></div>
                <p>{{ $product->content }}</p>
                <div class="col-md-4 col-md-offset-8"><h4>$ {{ $product->price }}</h4></div>
                <div class="text-center"><button type="submit" class="btn-comprar" value="Comprar"><span class="glyphicon glyphicon-shopping-cart"></span> Comprar</button></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12"><h2 class="prod-nombre">Productos Relacionados</h2></div></div>
        <div class="col-md-12">
            <div class="row">
                @foreach($relatedProducts as $rp)
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="@if($rp->getFirstImage()) {{ asset('images/'.$rp->getFirstImage()->original_name) }} @else {{ asset('images/default_image.jpg') }} @endif" alt="" style="widht:245px; height:140px">
                        <div class="caption">
                            <h4 class="pull-right">$ {{ $rp->price }}</h4>
                            <h4><a href="{{ route('showProduct', [$rp->id]) }}">{{ $rp->title }}</a></h4>
                            <p>{{ $rp->content }}</p>
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
@endsection