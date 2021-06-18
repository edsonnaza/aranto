 <div class="form-group row">
    <label for="precio_costo" class="col-lg-3 col-form-label requerido">Precio Costo </label>
    <div class="col-lg-8">
        <input type="text" name="precio_costo" id="precio_costo" class="form-control" value="{{old('precio_costo', $precioprod->precio_costo ?? '')}}" required/>
    </div>
</div>

 <div class="form-group row">
    <label for="precio_venta" class="col-lg-3 col-form-label requerido">Precio Venta </label>
    <div class="col-lg-8">
        <input type="text" name="precio_venta" id="precio_venta" class="form-control" value="{{old('precio_venta', $precioprod->precio_venta ?? '')}}" required/>
    </div>
</div>

  
 
  

 
 
<div class="form-group row">
    <label for="id_seguro" class="col-lg-3 col-form-label  ">Seguros</label>
    <div class="col-lg-8">
        <select name="id_seguro" id="id_seguro" class="form-control"   >
            <option value="">Seleccione Seguro</option>
         @foreach ($seguro as $seguros)
    <option value="{{ $seguros->id }}" 
    {{ (isset($precioprod) ? ($seguros->id == $precioprod->id_seguro ? 'selected' : '') : '')   }}> {{ $seguros->nombre_seguro }} </option>
  @endforeach 
        </select>
    </div>
</div>
   

 
 
  

  
  
  

</div>


 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>