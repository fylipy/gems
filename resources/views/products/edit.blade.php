@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editando Producto</div>
                    {!! Form::open(['route' => ['products.update', $product->id] , 'method' => 'put', 'files' => true]) !!}
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>Título:</label>
                            <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label>Contenido:</label>
                            <textarea type="text" class="form-control" name="content">{{ $product->content }}</textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label>Precio:</label>
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="color" value="{{ $product->color }}">
                            @if ($errors->has('color'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('color') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label>Categoría:</label>
                            {!! Form::select('category_id', $categories, $product->category->id, ['placeholder' => 'Seleccione una categoría', 'class' => 'form-control']) !!}
                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('visible') ? ' has-error' : '' }}">
                            <label>Activo:</label>
                            {!! Form::checkbox('visible', 1, $product->visible  ) !!}
                            @if ($errors->has('visible'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('visible') }}</strong>
                                </span>
                            @endif
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
                        <div class="form-group{{ $errors->has('image[]') ? ' has-error' : '' }}">
                            {!! Form::file('image[]', ['multiple' => 'true']) !!}
                            @if ($errors->has('image[]'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image[]') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a class="btn btn-default" href="{{ route('products.index') }}">Cancelar</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection