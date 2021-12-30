

<template>
 <div>
  <input type="text" id="producto" placeholder="what are you looking for?" v-model="query" v-on:keyup="autoComplete" class="form-control">
  <div class="panel-footer" v-if="results.length">
   <ul class="list-group">
    <a href="#" @click="this.open=false;" class="list-group-item list-group-item-action"    v-for="result in results" :key="result.id" >
     {{ result.producto_nombre }}
        
    </a>
   </ul>
  </div>
 </div>
</template>
<script>
 export default{
  data(){
   return {
    query: '',
    results: []
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 2){
     axios.get('/api/search',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
    }
   },
  async listar() {
      const res = await axios.get('/api/search');
      this.results = res.data;
    },
  }
 }
</script>