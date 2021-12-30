<template>
  <div>
    <h4 class="text-center">Detalles de la compra</h4>
    <hr />
  <div class="form-group row">
    <label for="persona_nombre" class="col-lg-3 col-form-label requerido">Nro. Venta: </label>
    <div class="col-lg-8">
        <input type="text" name="id_apertura" id="id_apertura" @click="listar(articulo.id_apertura)"  v-model="articulo.id_apertura"   class="form-control"   />
    </div>
</div>
  <button @click="listar(articulo.id_apertura);" class="btn-success btn-sm" type="button"  >Cargar</button>
    <!-- Button to Open the Modal -->
    <button @click="modificar=false; abrirModal();"  type="button" data-toggle="modal" class="btn btn-primary my-4">Nuevo</button>
  
    <!-- The Modal -->
    <div class="modal"   :class="{mostrar: modal}">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">{{tituloModal}}</h4>
            <button @click="cerrarModal();"  type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="my-4">
              <label for="nombre">Fecha</label>
              <input v-model="articulo.created_at" type="text" class="form-control" id="nombre" placeholder="Nombre del Articulo">
            </div>
            <div class="my-4">
              <label for="descripcion">descripcion del documento</label>
              <input v-model="articulo.descripcion_documento" type="text" class="form-control" id="descripcion" placeholder="Descripcion del Articulo">
            </div>
            <div class="my-4">
              <label for="stock">Nro. Documento</label>
              <input v-model="articulo.numero_documento" type="number" class="form-control" id="stock" placeholder="Stock del Articulo">
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
            <button  @click="guardar();" type="button" class="btn btn-success" data-dismiss="modal">
              Guardar
            </button>


          </div>
        </div>
      </div>
    </div>



    <table class="table table-striped">
      <thead class="gray">
        <tr>
          <th scope="col">#</th>
          <th scope="col">IdProducto</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio Compra</th>
          <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="art in articulos" :key="art.id">
          <th scope="row">{{ art.id }}</th>
          <td>{{ art.id_producto }}</td>
          <td>{{ art.cantidad }}</td>
          <td>{{ art.precio_compra }}</td>
          <td>
            <button  @click="modificar=true; abrirModal(art);" data-target="#modal-default" class="btn btn-warning">Editar</button>
          </td>
          <td>
            <button @click="eliminar(art.id)" data-target="#modal-default" class="btn btn-danger">
              Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      articulo:{
        id:1,
        id_apertura:'1',
        producto_nombre:'',
        id_producto:'1',
        id_medidas:1,
        cantidad:1,
        precio_compra:1,
        precio_venta:1,
      },
      id:0,
      modificar:true,
      modal:0,
      tituloModal:'',
      articulos: [],
    };
  },

  mounted() {
    axios.get('/api/comprasfidet').then(response => {
                this.articulos = response.data.data;
            })
  },
  methods: {
    async listar(id_apertura) {
      const res = await axios.get('/api/comprasfidet/?id_apertura='+id_apertura);
      this.articulos = res.data;
     // alert(id_apertura);
    },

   
    async eliminar(id) {
      const res = await axios.delete('/api/comprasfi/' + id);
      this.listar();
    },
    async guardar() {
      if(this.modificar){
        const res = await axios.put('/comprasfi/'+this.id, this.articulo);
        // console.log(this.id);
      }else{
        const res = await axios.post('/comprasfi/', this.articulo);
      }
      this.cerrarModal();
      this.listar();
    },
    abrirModal(data={}){
      this.modal=1;
      if(this.modificar){
        this.id=data.id;
        this.tituloModal="Modificar Articulo";
        this.articulo.created_at=data.created_at;
        this.articulo.descripcion_documento=data.descripcion_documento;
        this.articulo.numero_documento=data.numero_documento;
      }else{
        this.id=0;
        this.tituloModal="Crear Articulo";
        this.articulo.created_at='';
        this.articulo.descripcion_documento='';
        this.articulo.numero_documento='NO';
      }
    },
    cerrarModal(){
      this.modal=0;
    },
  },
  created() {
    this.listar(id_apertura);
  },
};
</script>

<style>
  .mostrar{
    display: list-item;
    opacity: 1;
    background: rgba(75, 56, 143, 0.705);
  }
</style>