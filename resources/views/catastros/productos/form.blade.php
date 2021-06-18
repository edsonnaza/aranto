 <div class="form-group row">
    <label for="persona_nombre" class="col-lg-3 col-form-label requerido">Nombre </label>
    <div class="col-lg-8">
        <input type="text" name="producto_nombre" id="producto_nombre" class="form-control" value="{{old('producto_nombre', $producto->producto_nombre ?? '')}}" required/>
    </div>
</div>

 <div class="form-group row">
    <label for="producto_descripcion" class="col-lg-3 col-form-label requerido">Descripcion</label>
    <div class="col-lg-8">
        <input type="text" name="producto_descripcion" id="producto_descripcion" class="form-control" value="{{old('producto_descripcion', $producto->producto_descripcion ?? '')}}" required/>
    </div>
</div>
 
  
 
 
 <div class="form-group row">
    <label for="id_seguro" class="col-lg-3 col-form-label  ">Categoria</label>
    <div class="col-lg-8">
        <select name="id_prodcategoriapadre" id="id_prodcategoriapadre"    class="form-control"   >
            
         @foreach ($Productos->get() as $index=> $catpadre)


    <option value="{{ $index }}" 
    {{ (isset($producto) ? ($index == $producto->id_prodcategoriapadre ? 'selected'  : '') : '')   }}> {{ $catpadre  }} </option>
  @endforeach 
        </select>
    </div>
</div>
 
    

<div class="form-group row">
    <label for="id_categoriahijo" class="col-lg-3 col-form-label  ">SubCategoria</label>
    <div class="col-lg-8">
        
          

             <select id="id_categoriahijo" data-old="{{ old('id_categoriahijo') }}" name="id_categoriahijo" class="form-control{{ $errors->has('id_categoriahijo') ? ' is-invalid' : '' }}"></select>
        
        </select>
    </div>
</div>
   

  
        <input type="hidden" id="idcathijoaux" name="idcathijoaux" value="{{ old('idcathijoaux', $producto->id_categoriahijo ?? '')}}"  />
 
   <input type="hidden" id="id_medidasbasica" name="id_medidabasicas" value="{{ old('id_medidabasicas', $producto->id_medidabasicas ?? '5')}}"  />
 


  
  
  

</div>


 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>
