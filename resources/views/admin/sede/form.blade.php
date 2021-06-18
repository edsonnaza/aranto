<div class="form-group row">
    <label for="nombre_sede" class="col-lg-3 col-form-label requerido">Nombre Sede</label>
    <div class="col-lg-8">
    <input type="text" name="nombre_sede" id="nombre_sede" class="form-control" value="{{old('nombre_sede', $data->nombre_sede ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="direccion" class="col-lg-3 col-form-label requerido">Dirección</label>
    <div class="col-lg-8">
    <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion', $data->direccion ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="ruc" class="col-lg-3 col-form-label requerido">Ruc</label>
    <div class="col-lg-8">
    <input type="text" name="ruc" id="ruc" class="form-control" value="{{old('ruc', $data->ruc ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="telefono" class="col-lg-3 col-form-label requerido">Telefono</label>
    <div class="col-lg-8">
    <input type="text" name="telefono" id="telefono" class="form-control" value="{{old('telefono', $data->telefono ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-lg-3 col-form-label requerido">email</label>
    <div class="col-lg-8">
    <input type="text" name="email" id="email" class="form-control" value="{{old('email', $data->email ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="foto" class="col-lg-3 col-form-label">Logo</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto_sede" data-initial-preview="{{isset($data->foto_sede) ? Storage::url("imagenes/logo_sedes/$data->foto_sede") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Logo+sede"}}" accept="image/*"/>
    </div>
</div>

 
