@extends("theme.$theme.layout")
@section('titulo')
  Catastro General
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/productos/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/pages/scripts/productos/index.js")}}" type="text/javascript"></script>
@endsection
@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
 
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/productos/categoriahijos.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
@inject('Productos', 'App\Models\Productos')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Editar catastro de:  {{$producto->producto_nombre}}</h3>
                <div class="card-tools">
                    <a href="{{route('articulos')}}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('actualizar_articulo', ['id' => $producto->id])}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf @method("put")
                     
                <div class="card-body">
                    @include('catastros.articulos.form')
                      <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-editar')
                        </div>
                    </div>
               </form>     
  <!-- /.card-header  -->
       @if(isset($precioprod))
              <div class="card-body">
               <div class="card-tools">
                    <a  data-toggle="modal" data-target="#existencias" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-fw fa-eye"></i> Ver existencia
                    </a>
                   
                </div>
                <div class="card-tools">
                    <a href="{{route('crear_precioporseguro',['id' => $producto->id])}}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo precio por seguro
                    </a>
                </div>

                
                 <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th class="width20">ID</th>
                            <th>Seguro </th>
                            <th>Precio Costo </th>
                            <th>Precio Venta </th>
                                                     
                            <th class="width80"></th>
                        </tr>
                    </thead>
                    <tbody>
               
                        @foreach($precioprod as $prodprecio)
                            <tr>
                                <td>{{$prodprecio->id}}</td>
                                <td>{{$prodprecio->nombre_seguro}}</td>
                                <td>{{$prodprecio->precio_costo}}</td>
                                <td>{{$prodprecio->precio_venta}} </td>                             
                                  
                                  
                             <td>
                                    <a href="{{route("editar_precioproducto", ['id' => $prodprecio->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_precioporseguro",  ['id' => $prodprecio->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete") 
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                            <i class="fa fa-times-circle text-danger"></i>
                                        </button>
                                    </form>
                            </td>
                            </tr>
                        @endforeach
                     
                    </tbody>
                </table>
            </div>
        @endif
  
                </div>
               
           
        </div>
    </div>
</div>


 <div class="modal fade" id="existencias">
        <div class="modal-dialog ">
          <div class="modal-content  bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Existencia por unidades</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <table class="table">
                  <thead>
                      <tr>
                          <th>Unidad</th>
                          <th>Cantidad</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                      <tr>

                            @foreach ($stock as $stk) 
                 
                     

                          <td scope="row"> {{$stk->nombre_unidad}}</td>
                          <td>{{$stk->cantidad}}</td>
                         
                      </tr>
                @endforeach    
                  </tbody>
              </table>
              
              <p></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
