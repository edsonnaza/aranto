  
   
  
 
  <div class="col-md-6">
     <div class="form-group input-group-sm">
         <label class="label-control small">Medicamentos/ Descartables / Otros.</label>
           <input name="productos" value=""   onkeyup="javascript:this.value=this.value.toUpperCase();document.getElementById('idproducto').value='';"   type="text" class="form-control input-sm"   required id="productos" onclick="select();" placeholder="Paracetamol 500mg" autocomplete="off">  
        </div><!-- /.form-group -->
    </div>
   <input type="hidden" id="idproducto">
        <div class="col-md-3">
          <div class="form-group input-group-sm">
         <label for="precioventa" class="label-control small">Precio Compra</label>
         <input type="text" value="0" class="form-control input-sm" id="precio_compra">
         </div>
          </div>
    <div class="col-md-3  ">
    <div class="form-group input-group-sm">
          <label for="cantidad" class="label-control small">Cantidad a reponer</label>
         <input type="text" class="form-control  " id="cantidad_reponer" value="1">
         
          </div>
        </div>

          <div class="pull-right">
       
         <button class="btn btn-block btn-primary btn-sm" onclick="InsertarItem(document.getElementById('idproducto').value,document.getElementById('precio_compra').value,document.getElementById('cantidad_reponer').value,document.getElementById('idcategoria').value,document.getElementById('catnombre').value,$('#productos').val(),$('#idalmacen').val(),$('#cantidad_min').val(),$('#existencia_actual').val());" type="button"><span class="glyphicon glyphicon-plus"></span> Agregar Item</button>
         <button class="btn btn-block btn-success btn-sm" onclick="Refresh();"> <span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
        
          

        <!-- checkbox -->
                 
      </div>
  
 


 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>
