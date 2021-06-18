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
    <label for="id_medidasbasicas" class="col-lg-3 col-form-label requerido">Unidad de medida</label>
    <div class="col-lg-8">
        <select name="id_medidasbasicas" id="id_medidasbasicas" class="form-control"  required>
            <option value="">Seleccione Medida</option>
         @foreach ($medidasbasicas as $medidas)
    <option value="{{ $medidas->id }}" 
    {{ (isset($articulo) ? ($medidas->id == $articulo->id_medidasbasicas ? 'selected' : '') : '')   }}> {{ $medidas->nombre_unidad_basica }} </option>
  @endforeach 
        </select>
    </div>
</div>
 
 
 
 <div class="form-group row">
    <label for="id_seguro" class="col-lg-3 col-form-label  ">Categoria</label>
    <div class="col-lg-8">
        <select name="id_prodcategoriapadre" id="id_prodcategoriapadre"    class="form-control"   >
            
         @foreach ($Productos->get() as $index=> $catpadre)

@if($index==4 || $index==5))
    <option value="{{ $index }}" 
    {{ (isset($producto) ? ($index == $producto->id_prodcategoriapadre ? 'selected'  : '') : '')   }}> {{ $catpadre  }} </option>
 
 @endif
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
   
 <div class="form-group row">
    <label for="id_seguro" class="col-lg-3 col-form-label  ">IVA</label>
    <div class="col-lg-8">
        <select name="id_iva" id="id_iva"    class="form-control"   >
            
         @foreach ($ivas as $iva)


    <option value="{{ $iva->id }}" 
    {{ (isset($producto) ? ($iva->id == $producto->id_iva ? 'selected'  : '') : '')   }}> {{ $iva->iva_nombre  }} </option>
  @endforeach 
        </select>
    </div>
</div>
  
        <input type="hidden" id="idcathijoaux" name="idcathijoaux" value="{{ old('idcathijoaux', $producto->id_categoriahijo ?? '')}}"  />
 
   

</div>


 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>
