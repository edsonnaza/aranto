@extends("theme.$theme.layout")
@section('titulo')
  Tareas
@endsection
@section("scripts")

 
 

<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
 <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('contenido')

<div id="app" class="row">
  <tareas></tareas>

	@include('tareas.create')
	@include('tareas.edit')

</div>            


@endsection