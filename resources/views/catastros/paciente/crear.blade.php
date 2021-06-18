@extends("theme.$theme.layout")
@section('titulo')
   Paciente
@endsection
 
 
@section("scripts")
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 

<script src="{{asset("assets/pages/scripts/paciente/crear.js")}}" type="text/javascript"></script>
      <!-- Script -->
      
  <script>

  
// CSRF Token
//  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function() {

     
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#full_name_persona").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "{{route('autocomplete.fetch')}}",
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#full_name_persona').val(ui.item.label); // display the selected text
            $('#id_persona').val(ui.item.value); // save selected id to input
            $('#id_tipodni').val(ui.item.id_tipodni);
            $('#numero_dni').val(ui.item.numero_dni);
            $('#id_persona').val(ui.item.value);
            $('#id_seguro').val(ui.item.id_seguro);
            $('#nro_mobil').val(ui.item.nro_mobil);
            $('#genero').val(ui.item.genero);
            $('#previewImg').val(ui.item.foto_persona);
            $('#email').val(ui.item.email);
            $('#ruc').val(ui.item.ruc);
            $('#fecha_nacimiento').val(ui.item.fecha_nacimiento);
           // $('#foto_up').attr('src', '/assets/no_preview.png');
           //var foto=Storage::url("imagenes/personas/"+ui.item.foto_persona);

           var foto_persona =ui.item.foto_persona;
         //  var foto = `<img src="/storage/${product.image}"`;
           // $("#previewImg").attr("src","imagenes/personas/"+foto) ;
           
                document.getElementById('foto_nueva').innerHTML='<div id="foto_nueva" class="col-lg-5"><img id="previewImg" src="public/imagenes/personas/"'+foto_persona+'"></div>';
           

            return false;
        }
    });

   
 

});
</script>


@endsection
@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/js/jqueryui/jquery-ui.min.css')}}">
  
  
@endsection
<style>
.select2-results { max-height: 500px; }
</style>
@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>




@endsection
@section('contenido')
 
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Registrar Paciente</h3>
                <div class="card-tools">
                    <a href="{{route('paciente')}}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('guardar_paciente')}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
              
                <div class="card-body">
                 
                    @include('catastros.paciente.form')
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
