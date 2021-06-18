@extends("theme.$theme.layout")
@section('titulo')
    Medicos
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/paciente/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
@endsection

@section('contenido')




<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Catastro de médicos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_persona')}}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
             <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th class="width20">ID</th>
                            <th>Nombre </th>
                             
                            <th>Nro. Celular </th>
                            <th>Nro. Teléfono </th>
                            <th>Especialidad</th>
                            <th>E-mail </th>
                            
                            <th>Foto</th>
                         
                          
                             
                            <th class="width80"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->full_name_persona}}</td>
                                 
                                <td>{{$data->nro_mobil}}</td>
                                <td>{{$data->nro_telefono}}</td>
                                <td> 
                                   @foreach ($especialidades as $especialidad)
                                   @if ($data->id_especialidad == $especialidad->id)
                                    {{$especialidad->nombre_especialidad}}
                                       
                                   @endif
                           


                                @endforeach
                                 
                                 </td>                               
                                 <td>{{$data->email}}</td>
                                  <td class="text-center"><img src="{{isset($data->foto_persona) ? Storage::url("imagenes/personas/" . $data->foto_persona) :"http://www.placehold.it/150x150/EFEFEF/AAAAAA&text=Foto+Paciente"}}"   style="width:50px" ></td>
                                   
                                <td>
                                    <a href="{{route("editar_medico", ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_medico",  ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
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
