<div class="form-group row">
    <label for="id_categoriahijo" class="col-lg-3 col-form-label  ">SubCategoria</label>
    <div class="col-lg-8">
        <select name="id_categoriahijo" id="id_categoriahijo" class="form-control"   >
            <option value="">Seleccione Subcategoria</option>
         @foreach ($categoriahijos as $cathijo)
    <option value="{{ $cathijo->id }}" 
    {{ (isset($producto) ? ($cathijo->id == $producto->id_categoriahijo ? 'selected' : '') : '')   }}> {{ $cathijo->nombre_categoriahijo }} </option>
  @endforeach 
        </select>
    </div>
</div>