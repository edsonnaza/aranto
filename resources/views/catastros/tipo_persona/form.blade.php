<div class="form-group row">
    <label for="nombre_tipo" class="col-lg-3 col-form-label requerido">Nombre Tipo</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_tipopersona" id="nombre_tipopersona" class="form-control" value="{{old('nombre_tipopersona', $data->nombre_tipopersona ?? '')}}" required/>
    </div>
  
</div>
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>