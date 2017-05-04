@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Creando Nuevo Producto</div>
                    {!! Form::open(['route' => 'products.store', 'method' => 'post', 'files' => true]) !!}
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>Título:</label>
                            <input type="text" class="form-control" name="title" value="">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label>Contenido:</label>
                            <textarea type="text" class="form-control" name="content"></textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label>Precio:</label>
                            <input type="number" class="form-control" name="price">
                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="color" value="">
                            @if ($errors->has('color'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('color') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label>Categoría:</label>
                            {!! Form::select('category_id', $categories, null, ['placeholder' => 'Seleccione una categoría', 'class' => 'form-control']) !!}
                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('visible') ? ' has-error' : '' }}">
                            <label>Activo:</label>
                            {!! Form::checkbox('visible', true, true) !!}
                            @if ($errors->has('visible'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('visible') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('image[]') ? ' has-error' : '' }}">
                            <label>Imágenes:</label>
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