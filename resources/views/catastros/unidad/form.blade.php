<div class="form-group row">
    <label for="nombre_tipo" class="col-lg-3 col-form-label requerido">Nombre Unidad</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_unidad" id="nombre_unidad" class="form-control" value="{{old('nombre_tipopersona', $data->nombre_unidad ?? '')}}" required/>
    </div>
  
</div>
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>