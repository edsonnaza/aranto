<div class="form-group row">
    <label for="nombre_estado-civil" class="col-lg-3 col-form-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_estadocivil" id="nombre_estadocivil" class="form-control" value="{{old('nombre_estado-civil', $data->nombre_estadocivil ?? '')}}" required/>
    </div>
  
</div>
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>