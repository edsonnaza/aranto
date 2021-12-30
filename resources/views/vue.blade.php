 
@extends("theme.$theme.layout")
@section('titulo')
 CRUD VUEJS
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/productos/index.js")}}" type="text/javascript"></script>
   <script src="{{asset("js/app.js")}}"></script>
 

<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
@endsection

@section('contenido')
    <div id="app" >
        <articulos></articulos>
           </div>
@endsection