<div class="form-group row">
    <label for="nombre_seguro" class="col-lg-3 col-form-label requerido">Nombre del Seguro</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_seguro" id="nombre_seguro" class="form-control" value="{{old('nombre_seguro', $data->nombre_seguro ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="descripcion" class="col-lg-3 col-form-label requerido">Descripcion</label>
    <div class="col-lg-8">
    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $data->descripcion ?? '')}}" required/>
    </div>
</div>
 
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>
 