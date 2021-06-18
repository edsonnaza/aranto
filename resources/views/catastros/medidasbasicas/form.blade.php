<div class="form-group row">
    <label for="nombre_seguro" class="col-lg-3 col-form-label requerido">Nombre Unidad de Medida</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_unidad_basica" id="nombre_unidad_basica" class="form-control" value="{{old('nombre_unidad_basica', $data->nombre_unidad_basica ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="simbolo" class="col-lg-3 col-form-label requerido">Símbolo</label>
    <div class="col-lg-8">
    <input type="text" name="simbolo" id="simbolo" class="form-control" value="{{old('simbolo', $data->simbolo ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="magnitud" class="col-lg-3 col-form-label requerido">Magnitud</label>
    <div class="col-lg-8">
    <input type="text" name="magnitud" id="magnitud" class="form-control" value="{{old('magnitud', $data->magnitud ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="descripcion" class="col-lg-3 col-form-label requerido">Descripcion</label>
    <div class="col-lg-8">
    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $data->descripcion ?? '')}}" required/>
    </div>
</div>
 
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>
 