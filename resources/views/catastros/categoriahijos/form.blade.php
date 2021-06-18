<div class="form-group row">
    <label for="nombre_tipo" class="col-lg-3 col-form-label requerido">Nombre Sub-Categoria</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_categoriahijo" id="nombre_categoriahijo" class="form-control" value="{{old('nombre_categoriahijo', $hijos->nombre_categoriahijo ?? '')}}" required/>
    </div>
  
</div>
 <input type="hidden" name="id_categoriapadre" id="id_categoriapadre" value={{$padres->id}}>
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>