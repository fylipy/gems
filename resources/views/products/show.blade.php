@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ver Producto</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Título:</label>
                            <input type="text" class="form-control" name="title" value="{{ $product->title }}" disabled>
                        </div>
                        <div class="form-group-lg">
                            <label>Contenido:</label>
                            <textarea type="text" class="form-control" name="content" disabled>{{ $product->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Precio:</label>
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="color" value="{{ $product->color }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Categoría:</label>
                            <input type="text" class="form-control" name="category_id" value="{{ $product->category->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Activo:</label>
                            {!! Form::checkbox('visible', true, $product->visible) !!}
                        </div>
                        <div class="form-group">
                            <label>Imágenes:</label>
                            <div class="row">
                                @foreach($product->images as $image)
                                    <div class="col-xs-6 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="{{ asset('images/'.$image->original_name) }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-success">Editar producto</a>
                            <a class="btn btn-default" href="{{ route('products.index') }}">Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection