<div class="form-group row">
    <label for="nombre_tipo" class="col-lg-3 col-form-label requerido">Nombre Categoria</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_categoriapadre" id="nombre_categoriapadre" class="form-control" value="{{old('nombre_categoriapadre', $padre->nombre_categoriapadre ?? '')}}" required/>
    </div>
  
</div>
 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>