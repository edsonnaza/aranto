@extends("theme.$theme.layout")
@section('titulo')
    Catastro General de Consultas/Servicios
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
                <h3 class="card-title">Catastro general de Medicamentos y Descartables</h3>
                <div class="card-tools">
                    <a href="{{route('crear_articulo')}}" class="btn btn-outline-secondary btn-sm">
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
                            <th>Nombre </th>
                            <th>Descripcion </th>
                            <th>Categoria </th>
                            <th>Subcategoria </th>
                           
                         
                          
                             
                            <th class="width80"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->producto_nombre}}</td>
                                <td>{{$data->producto_descripcion}}</td>
                                <td>   @foreach ($categoriapadre as $catpadre)
                                                 
                                                 
                                            @if ($data->id_prodcategoriapadre === $catpadre->id)
                                                   {{$catpadre->nombre_categoriapadre }} 
                                      
                                              @endif  
                                               
                                       @endforeach 
                                 
                                  
                                  </td>
                                <td> @foreach ($categoriahijos as $cathijo)
                                                 
                                                 
                                            @if ($data->id_categoriahijo === $cathijo->id)
                                                   {{$cathijo->nombre_categoriahijo }} 
                                      
                                              @endif  
                                               
                                       @endforeach </td>
                               
                                
                                           
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
            </div>
        </div>
    </div>
</div>
@endsection
