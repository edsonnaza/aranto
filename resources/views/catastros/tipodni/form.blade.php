<div class="form-group row">
    <label for="nombre_tipodni" class="col-lg-3 col-form-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_tipodni" id="nombre_tipodni" class="form-control" value="{{old('nombre_tipodni', $data->nombre_tipodni ?? '')}}" required/>
    </div>
  
</div>
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>