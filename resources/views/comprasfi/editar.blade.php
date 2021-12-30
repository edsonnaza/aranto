@extends("theme.$theme.layout")
@section('titulo')
  Catastro General
@endsection

@section("scripts")
 
  
     <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
  <script src="{{asset("js/app.js")}}"></script>
@endsection
@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
 

   
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>

 

 
@endsection

@section('contenido')
 
<div class="row">
    <div class="col-md-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-info">
            <div class="card-header ">
                 Nro Compra:  {{$comprasfi_cab->id}} 
                        -
                Unidad Destino:   @foreach ($almacenes as $almacen)
                                  @if ($almacen->id == $comprasfi_cab->id_unidad_destino)
                                    {{$almacen->nombre_unidad}} 
                                  @endif
                                 @endforeach 

                                 -
                    <label for="proveedor_nombre">Proveedor:</label>
                      @foreach ($proveedores as $proveedor)
                              @if ($proveedor->id == $comprasfi_cab->id_proveedor)
                                  {{$proveedor_nombre=$proveedor->full_name_persona}} 
                              @endif
                      @endforeach
             -
             Descripción: {{ $comprasfi_cab->descripcion_documento}}
                <div class="card-tools">
                    <a href="{{route('articulos')}}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
                   @csrf @method("put")
                     
       <div class="card-body">
  
 
 

  <div class="row">
                        
        
                       
     <div class="col-6">
        <div class="form-group input-group-sm">
         <label class="label-control small">Medicamentos/ Descartables / Otros.</label>
           <input name="productos" onclick="select();"  class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();document.getElementById('id_producto').value='';"   type="text" class="form-control input-sm"   required id="productos"   placeholder="Paracetamol 500mg" autocomplete="off"> 
            <div id="categoryList">
    </div>
        </div><!-- /.form-group -->
      </div>
      
    <input type="hidden" v-model id="id_producto">
        <div class="col-2">
          <div class="form-group input-group-sm">
         <label for="precioventa" class="label-control small">Precio Compra</label>
         <input type="text" value="0" class="form-control input-sm" id="precio_compra">
         </div>
          </div>
        <div class="col-2  ">
             <div class="form-group input-group-sm">
          <label for="cantidad" class="label-control small">Cantidad a reponer</label>
         <input type="text" class="form-control  " id="cantidad_reponer" value="1">
         
          </div>
        </div>
       <div class="col-2">
       <br>
         <div class="btn-group">
              <br>
         <div class="form-group input-group-sm">
         <label></label>
         <button class="btn btn-success btn-sm" onclick="InsertarItem(document.getElementById('idproducto').value,document.getElementById('precio_compra').value,document.getElementById('cantidad_reponer').value,document.getElementById('idcategoria').value,document.getElementById('catnombre').value,$('#productos').val(),$('#idalmacen').val(),$('#cantidad_min').val(),$('#existencia_actual').val());" type="button"><i class="fa fa-plus"></i> Añadir</button>
         <button class="btn btn-default btn-sm" onclick="Refresh();"> <i class="fa fa-update"></i> Actualizar</button>
        </div>
          </div>
          

          
          </div>
          </div>
        
<div class="row">
                  <div class="col-2">
                    <div class="form-group input-group-sm">
                      <label for="catnombre" class="small">Categoria Prod.:</label>
                      <input type="text" class="form-control" readonly="true" id="categoriapadre">
                      <input type="hidden" class="form-control"   id="id_prodcategoriapadre">

                  </div>
                  </div>

                    <div class="col-2">
                    <div class="form-group input-group-sm">
                     
                       <label for="existencia_actual" class="small">Exist. en F. Interna:</label> 
                       <input type="text" class="form-control" readonly="true" id="cantidad_unidad">
                      </div>
                        <input type="hidden" readonly="true" id="cantidad_min">
                  </div>

                     <div class="col-2">
                    <div class="form-group input-group-sm">
                       <label for="precio_venta" class="small">Precio Venta:</label>
                        <input type="text" class="form-control" readonly="true" id="precio_venta">
                      </div>
                  </div>
            
                            
</div>
        
         <div id="app"  >
        <tbody>
    <tr v-for="ministry in ministries">
        <td>@{{ ministry.id }}</td>
        <td>@{{ ministry.descripcion }}</td>
    </tr>
</tbody>
        
           </div>
      <!-- fix for small devices only -->
      <div class="box-tools pull​-right">
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3 ">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          </div>
          <!-- /.col -->
</div>
                    </div>
             
  <!-- /.card-header  -->
        
  
                </div>
               
          
        </div>
        
    </div>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   
<script>
$(document).ready(function(){
 $('#productos').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ url('product-list') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#categoryList').fadeIn();  
           $('#categoryList').html(data);
          }
         });
        }
    });
    $(document).on('click', 'li', function(e){  
        $('#productos').val($(this).text());  
        $('#categoryList').fadeOut();  
         var id = $(e.target).attr('id');
         //var id_categoria=$(e.target).attr('id_catpadre');
         //var id_categoria= document.getElementById('id_catpadre').value;  
        //alert(id);
           $('#id_producto').val(id);  
           $('#id_prodcategoriapadre').val(document.getElementById('id_catpadre').value);  
            $('#categoriapadre').val(document.getElementById('catnombre').value);  
             $('#cantidad_unidad').val(document.getElementById('cantidad').value); 
             
              

         
    });  
});
</script>
 
</div>

 <script src="{{asset("js/app.js")}}"></script>
<script>
 
Vue.component('example', {
  template: '<span>{{ message }}</span>',
  data: function () {
    return {
      message: 'not updated'
    }
  },
  methods: {
    updateMessage: function () {
      this.message = 'updated'
      console.log(this.$el.textContent) // => 'not updated'
      this.$nextTick(function () {
        console.log(this.$el.textContent) // => 'updated'
      })
    }
  }
})
</script>
@endsection
