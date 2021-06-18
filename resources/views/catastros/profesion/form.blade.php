<div class="form-group row">
    <label for="nombre_profesion" class="col-lg-3 col-form-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_profesion" id="nombre_profesion" class="form-control" value="{{old('nombre_profesion', $data->nombre_profesion?? '')}}" required/>
    </div>
  
</div>
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>