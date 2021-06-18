@extends("theme.$theme.layout")
@section('titulo')
  Sub-Categorías 
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        
       @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-info">
            <div class="card-header">
                
                @foreach ($padre as $padre)
                <td><strong> Categoria Padre: {{ $padre->nombre_categoriapadre }}</strong></td>
              
           
                @endforeach

               
                <div class="card-tools">
                    
                    <a href="{{URL::route('crear_categoria.hijo',$padre->id ?? '')}}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                    
                </div>
                  <div class="card-tools">
                    <a href="{{route('categoriapadre')}}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <div class="card-body  ">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th class="width20">ID</th>
                            <th>Nombre SubCategoria </th>
                             
                            <th class="width80"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hijos as $hijos)

                      
                            
                       
                            <tr>
                                <td>{{$hijos->id}}</td>
                                <td>{{$hijos->nombre_categoriahijo}}</td>
                                
                                <td>
                                               <a href="{{route('editar_categoria.hijo', ['id' => $hijos->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('eliminar_categoria.hijo', ['id' => $hijos->id])}}" class="d-inline form-eliminar" method="POST">
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
