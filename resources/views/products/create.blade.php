@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Creando Nuevo Producto</div>

                    <div class="panel-body">
                        <a href="{{ route('products.create') }}" class="btn btn-default pull-right">Agregar Nuevo Producto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection