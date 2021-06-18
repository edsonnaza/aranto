@extends("theme.$theme.layout")
@section('titulo')
   Catastro General
@endsection

 
@section("scripts")

 
<script src="{{asset("assets/pages/scripts/productos/categoriahijos.js")}}" type="text/javascript"></script>
 
@endsection
@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section("scriptsPlugins")
 
 
 
 
 
 
@endsection
@section('contenido')
@inject('Productos', 'App\Models\Productos')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Registrar Artículos: Medicamentos / Descartables</h3>
                <div class="card-tools">
                    <a href="{{route('articulos')}}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('guardar_articulo')}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('catastros.articulos.form')
                    
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-crear')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
