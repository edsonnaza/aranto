 
 <div class="form-group row">
    <label for="persona_nombre" class="col-lg-3 col-form-label requerido">Nombres</label>
    <div class="col-lg-8">
        <input type="text" name="persona_nombre" id="persona_nombre" class="form-control" value="{{old('persona_nombre', $data->persona_nombre ?? '')}}" required/>
    </div>
</div>

 <div class="form-group row">
    <label for="persona_apellido" class="col-lg-3 col-form-label requerido">Apellidos</label>
    <div class="col-lg-8">
        <input type="text" name="persona_apellido" id="persona_apellido" class="form-control" value="{{old('persona_apellido', $data->persona_apellido ?? '')}}" required/>
    </div>
</div>
 
  <div class="form-group row">
    <label for="ruc" class="col-lg-3 col-form-label ">Ruc</label>
    <div class="col-lg-8">
        <input type="text" name="ruc" id="ruc" class="form-control" value="{{old('ruc', $data->ruc ?? '')}}" required/>
    </div>
</div>
  <div class="form-group row">
    <label for="ruc" class="col-lg-3 col-form-label ">Razón Social / Nombre Fantasia</label>
    <div class="col-lg-8">
        <input type="text" name="ruc" id="ruc" class="form-control" value="{{old('ruc', $data->nombre_proveedor ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_nacimiento" class="col-lg-3 col-form-label ">Fecha Nacimiento</label>
    <div class="col-md-8">
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{old('fecha_nacimiento', $data->fecha_nacimiento ?? '')}}" required/>
    </div>
</div>

 
<input type="hidden" value="1" name="id_seguro">
 
 

<input   type="hidden" name="id_clasificacion" id="id_clasificacion"  value="{{old('id_clasificacion',$data->id_clasificacion ?? '')}}">

<div class="form-group row">
    <label for="id_profesion" class="col-lg-3 col-form-label requerido">Profesión</label>
    <div class="col-lg-8">
        <select name="id_profesion" id="id_profesion" class="form-control"  required>
            <option value="">Seleccione Profesión</option>
         @foreach ($profesion as $profesion)
    <option value="{{ $profesion->id }}" 
    {{ (isset($data) ? ($profesion->id == $data->id_profesion ? 'selected' : '') : '')   }}> {{ $profesion->nombre_profesion }} </option>
  @endforeach 
        </select>
    </div>
</div>

 <div class="form-group row">
    <label for="id_nacionalidad" class="col-lg-3 col-form-label requerido">Nacionalidad</label>
    <div class="col-lg-8">
        <select name="id_nacionalidad" id="id_nacionalidad" class="form-control"  required>
            <option value="">Seleccione Nacionalidad</option>
         @foreach ($nacionalidad as $nacionalidad)
    <option value="{{ $nacionalidad->id }}" 
    {{ (isset($data) ? ($nacionalidad->id == $data->id_nacionalidad ? 'selected' : '') : '')   }}> {{ $nacionalidad->nombre_nacionalidad }} </option>
  @endforeach 
        </select>
    </div>
</div>

 <div class="form-group row">
    <label for="id_estadocivil" class="col-lg-3 col-form-label requerido">Estado Civil</label>
    <div class="col-lg-8">
        <select name="id_estadocivil" id="id_estadocivil" class="form-control"  required>
            <option value="">Seleccione Estado Civil</option>
         @foreach ($estadocivil as $estadocivil)
    <option value="{{ $estadocivil->id }}" 
    {{ (isset($data) ? ($estadocivil->id == $data->id_estadocivil ? 'selected' : '') : '')   }}> {{ $estadocivil->nombre_estadocivil }} </option>
  @endforeach 
        </select>
    </div>
</div>
<input type="hidden" value="5" name="id_estadocivil">
 
   

    <input name="id_clasificacion" id="id_clasificacion"   type="hidden" value="2">


 <div class="form-group row">
    <label for="id_tipodni" class="col-lg-3 col-form-label requerido">Tipo Documento</label>
    <div class="col-lg-8">
        <select name="id_tipodni" id="id_tipodni" class="form-control"  required>
            <option value="">Seleccione CDI</option>
         @foreach ($tipodni as $tipodni)
    <option value="{{ $tipodni->id }}" 
    {{ (isset($data) ? ($tipodni->id == $data->id_tipodni ? 'selected' : '') : '')   }}> {{ $tipodni->nombre_tipodni }} </option>
  @endforeach 
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="numero_dni" class="col-sm-3 col-form-label requerido">Nro. Documento</label>
    <div class="col-lg-8">
        <input type="text" name="numero_dni" id="numero_dni" class="form-control" value="{{old('numero_dni', $data->numero_dni ?? '')}}" required/>
    </div>
</div>

 <div class="form-group row">
    <label for="genero" class="col-lg-3 col-form-label requerido">Género</label>
    <div class="col-lg-8">
        <select name="genero" id="genero" class="form-control"  required>
            <option value="">Género</option>
             
         @foreach ($generos as $genero)
    <option value="{{ $genero->genero }}" 
    {{ (isset($data) ? ($genero->genero == $data->genero ? 'selected' : '') : '')   }}> {{ $genero->nombre_genero }} </option>
  @endforeach 
    
        </select>
    </div>
</div>

<input type="hidden" value="1" name="genero">

<div class="form-group row">
    <label for="id_profesion" class="col-lg-3 col-form-label requerido">Especialidad</label>
    <div class="col-lg-8">
        <select name="id_especialidad" id="id_especialidad" class="form-control"  required>
            <option value="">Seleccione Especialidad</option>
         @foreach ($especialidades as $especialidad)
    <option value="{{ $especialidad->id }}" 
    {{ (isset($data) ? ($especialidad->id == $data->id_especialidad ? 'selected' : '') : '')   }}> {{ $especialidad->nombre_especialidad }} </option>
  @endforeach 
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="nro_mobil" class="col-lg-3 col-form-label requerido">Nro. Celular</label>
    <div class="col-lg-8">
        <input type="text" name="nro_mobil" id="nro_mobil" class="form-control" value="{{old('nro_mobil', $data->nro_mobil ?? '')}}" required/>
</div>
</div>

<div class="form-group row">
    <label for="email" class="col-lg-3 col-form-label requerido">E-Mail</label>
    <div class="col-lg-8">
        <input type="text" name="email" id="email" class="form-control" value="{{old('email', $data->email ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="nro_telefono" class="col-lg-3 col-form-label ">Nro. Teléfono</label>
    <div class="col-lg-8">
        <input type="text" name="nro_telefono" id="nro_telefono" class="form-control" value="{{old('nro_telefono', $data->nro_telefono ?? '')}}" />
    </div>
</div>

<div class="form-group row">
    <label for="facebook" class="col-lg-3 col-form-label ">Facebook</label>
    <div class="col-lg-8">
        <input type="text" name="facebook" id="facebook" class="form-control" value="{{old('facebook', $data->facebook ?? '')}}" />
    </div>
</div>
<div class="form-group row">
    <label for="facebook" class="col-lg-3 col-form-label ">Direccion</label>
    <div class="col-lg-8">
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion', $data->direccion ?? '')}}" />
    </div>
</div>
 
<div class="form-group row">
    <label for="foto" class="col-lg-3 col-form-label">Foto</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto_persona" data-initial-preview="{{isset($data->foto_persona) ? Storage::url("imagenes/personas/$data->foto_persona") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Usuario+Persona"}}" accept="image/*"/>
    </div>

</div>

 
 

</div>


 
 <input type="hidden" name="sede_id" id="sede_id" value={{session()->get('sede_id')}}>