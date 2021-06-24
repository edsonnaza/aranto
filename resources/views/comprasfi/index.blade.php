@extends("theme.$theme.layout")
@section('titulo')
    Compras de Farmacia Interna
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/productos/index.js")}}" type="text/javascript"></script>
 
 

<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
@endsection

@section('contenido')
@inject('Productos', 'App\Models\Productos')

<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Compras de Medicamentos y Descartables</h3>
                <div class="card-tools">
                  <a  data-toggle="modal" data-target="#registrarcompra" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nueva compra
                    </a>
                    <a href="{{route('crear_comprasfi')}}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
             <!-- /.card-header -->
              <div class="card-body">
                 <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th class="width20">ID</th>
                            <th>Fecha </th>
                            <th>Unidad Destino </th>
                             <th>Descripcion </th>
                            <th>Proveedor </th>
                            <th>Terminado </th>
                           
                         
                          
                             
                            <th class="width80"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                 <td>{{$data->created_at}}</td>
                               <td>{{$data->id_unidad_destino}}</td>
                                <td>{{$data->descripcion_documento}}</td>
                                  <td>{{$data->id_proveedor}}</td>
                                <td>{{$data->terminado}}</td>
                                 
                               
                                
                                           
                                <td>
                                    <a href="{{route("editar_articulo", ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_producto",  ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
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

        <div class="modal fade" id="registrarcompra">
        <div class="modal-dialog ">
          <div class="modal-content  bg-default">
            <div class="modal-header">
              <h4 class="modal-title">Registrar compra nueva</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            

      <form action="{{route("crear_comprasfi")}}" method="GET">
   
       
 
           <div class="form-group">
                    <label >Unidad Destino Stock</label>
                    <select name="id_unidad_destino"     class="form-control" disabled="true"   >
                       <option selected="true"> Seleccionar Unidad  </option>
                              
                            @foreach ($almacenes as $almacen)
                        <option value="{{ $almacen->id }}" 
                        {{ (isset($almacen) ? ($almacen->id == '1' ? 'selected' : '') : '')   }}> {{ $almacen->nombre_unidad }} </option>
                    @endforeach 
                                                    

                      
                    </select>


                  </div><!-- /.form-group -->

                  


                  <div class="form-group">
                    <label >Proveedor</label>
                    <select name="id_proveedor"  id="id_proveedor"    class="form-control" required="true"  >
                       <option selected="true"> Seleccionar Proveedor </option>
                                      @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" 
                        {{ (isset($data) ? ($proveedor->id == $data->id_proveedor ? 'selected' : '') : '')   }}> {{ $proveedor->full_name_persona }} </option>
                    @endforeach 
                                  
                                 
                      
                    </select>
                  </div><!-- /.form-group -->

                    <div class="form-group">
                    <label >Tipo Documento</label>
                    <select name="id_tipodocumento"  id="id_tipodocumento"    class="form-control" required="true"  >
                       <option selected="true"> Seleccionar Documento </option>
                      @foreach ($tipodocumentos as $doc)
                        <option value="{{ $doc->id }}" 
                        {{ (isset($data) ? ($doc->id == $data->id_tipodocumento ? 'selected' : '') : '')   }}> {{ $doc->documento_nombre }} </option>
                    @endforeach 
                    </select>
                  </div><!-- /.form-group -->

     <div class="form-group ">
           <label>Numero de Documento</label>
           <input type="text"  class="form-control" name="numero_documento" id="numero_documento">
        </div>
            <div class="form-group ">
           <label>Fecha del Documento</label>
           <input type="date"  class="form-control" name="fecha_documento" id="fecha_documento">
        </div>
                           
                    <input type="hidden" name="id_almacen_destino"  value=""   class="form-control" required="true"  >
       

        <div class="form-group ">
           <label>Descripcion</label>
           <input type="text"  class="form-control" name="descripcion_documento" id="descripcion_documento">
        </div>

        <input type="hidden" name="accion" value="guardarcabecera">
         <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>
         <input type="hidden" name="id_usuariocreado" id="id_usuariocreado" value={{session()->get('usuario_id')}}>
        <input type="hidden" name="usuario_creado" id="usuario_creado" value={{session()->get('nombre_usuario')}}>
        
                 @foreach ($almacenes as $almacen)
                       
                        
                      @if ($almacen->id == '1')
                        <input type='hidden' name='id_unidad_origen' value='{{$almacen->id}}'  >
                         <input type='hidden' name='id_unidad_destino' value='{{$almacen->id}}'  >
                          
                      @endif
                    @endforeach
      </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" onclick="Refresh();" data-dismiss="modal">Cerrar</button>
         <button type="submit" name="accion" value="RegistrarNuevaCompra"  class="btn btn-warning">Confirmar?</button>
      </div>

      </form>
    </div>
  </div>
</div>


              
             
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
            </div>
        </div>
    </div>

    

</div>
@endsection
