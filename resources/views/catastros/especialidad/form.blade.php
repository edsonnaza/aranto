<div class="form-group row">
    <label for="nombre_especialidad" class="col-lg-3 col-form-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_especialidad" id="nombre_especialidad" class="form-control" value="{{old('nombre_especialidad', $data->nombre_especialidad ?? '')}}" required/>
    </div>
  
</div>
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>