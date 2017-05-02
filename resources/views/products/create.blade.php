@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Creando Nuevo Producto</div>
                    {!! Form::open(['route' => 'products.store', 'method' => 'post', 'files' => true]) !!}
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Título:</label>
                            <input type="text" class="form-control" name="title" value="">
                        </div>
                        <div class="form-group">
                            <label>Contenido:</label>
                            <textarea type="text" class="form-control" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Precio:</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="color" value="">
                        </div>
                        <div class="form-group">
                            <label>Categoría:</label>
                            {!! Form::select('category_id', $categories, null, ['placeholder' => 'Seleccione una categoría', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Activo:</label>
                            {!! Form::checkbox('visible', true, true) !!}
                        </div>
                        <div class="form-group">
                            <label>Imágenes:</label>
                            {!! Form::file('image[]', ['multiple' => 'true']) !!}
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