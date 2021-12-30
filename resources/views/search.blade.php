
@extends("theme.$theme.layout")
@section('titulo')
   Paciente
@endsection
@section("scriptsPlugins")

 
@section("scripts")

 
  <!-- Using jQuery with a CDN -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- JS file -->
<script src="{{asset("assets/js/articulos.js")}}" type="text/javascript"></script>


@endsection 
 
 
 
@endsection
@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
 

    <!-- CSS file -->
<link rel="stylesheet" href="{{asset("assets/js/easycomplete/easy-autocomplete.min.css")}}">

<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="{{asset("assets/js/easycomplete/easy-autocomplete.themes.min.css")}}">
@endsection
 
@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>

<link href="{{asset('css/app.css')}}" rel="stylesheet">




  

@endsection
@section('contenido')
             

                <div class="card-body">
                 <h1> Buscar Articulos con Vue</h1>
                 <div id="app">
                  <example> </example>
                 
                  </div>
                </div>
                 
@endsection
