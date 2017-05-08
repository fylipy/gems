@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Productos
                            <a href="{{ route('products.create') }}" class="btn btn-default pull-right">
                                Agregar Nuevo Producto
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                    </div>
                    <div class="panel-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif

                        <div class="row">
                            @foreach($products as $p)
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{ route('products.show', [$p->id]) }}">
                                        <img src="@if($p->getFirstImage()) {{ asset('images/'.$p->getFirstImage()->original_name) }} @else {{ asset('images/default_image.jpg') }} @endif">
                                    </a>
                                    <div class="caption">
                                        <h3><a href="{{ route('products.show', [$p->id]) }}">{{ $p->title }}</a></h3>
                                        <p>$ {{ $p->price }}</p>
                                        <hr>
                                        <p>
                                            {{ $p->content }}
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-2">
                                                <a href="{{ route('products.edit', [$p->id]) }}" class="btn btn-success">Editar</a>
                                            </div>
                                            <div class="col-md-3" id="delete_form">
                                                {{--<delete-form></delete-form>--}}
                                                <delete-form></delete-form>
                                                {{--<form v-on:submit.prevent="confirmDelete">--}}
                                                    {{--<input type="hidden" v-model="product_id" value="{{ $p->id }}">--}}
                                                {{--</form>--}}
                                                {{--{{ Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $p->id], 'id' => 'delete_from']) }}--}}
                                                    {{--{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}--}}
                                                {{--{{ Form::close() }}--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection