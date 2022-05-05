<template>
<q-page class="q-pa-xs">
<div class="row">
  <div class="col-12">
    <q-form @submit="consulta">
      <div class="row">
        <div class="col-3">
          <q-input dense outlined label="Ingresar padron" v-model="padron" />
        </div>
        <div class="col-3 flex flex-center">
          <q-btn type="submit" class="full-width" label="Consultar" color="positive" icon="search" />
        </div>
      </div>
    </q-form>
  </div>
</div>
</q-page>
</template>

<script>
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Buscararchivo",
  data(){
    return{
      padron:'1-11-38209',
      gest:'',
      nombre:'',
      tipo:'',
    }
  },
  created() {
    this.consulta()
  },
  methods:{
    consulta(){
      this.$q.loading.show()
      this.$api.get('archivo/'+this.padron).then(res=>{
        console.log(res.data)
        this.$q.loading.hide()
      }).catch(err=>{
        this.$q.loading.hide()
        this.$q.notify({
          message:err.response.data.message,
          color:'red',
          icon:'error',
        })
      })
    }
  }
}
</script>

<style scoped>

</style>
